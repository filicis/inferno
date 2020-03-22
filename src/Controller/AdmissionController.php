<?php


/**
*	  AdmissionController
*
*
*
*
**/


namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Admission;
use App\Entity\Afsnit;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

//use Symfony\Component\Validator\Constraints\DateTime;


use Symfony\Component\Security\Core\Security;



class AdmissionController extends AbstractController
{

  private $security;

  public function __construct(Security $security)
  {
    // Avoid calling getUser() in the constructor: auth may not
    // be complete yet. Instead, store the entire Security object.
    $this->security = $security;
  }


  /**
  * @Route("/admission", name="admission")
  */

  public function index(Request $request)
  {
    $cpr= $request->get('cpr');


    $form= $this->createFormBuilder()
    ->add('cpr', TextType::class)
    ->add('Send', SubmitType::class)
    ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      $value= $data['cpr'];

      $patient= $this->getDoctrine()
      ->getRepository(Patient::class)
      ->findOneBy(['cpr' => $value, ]);

      $afsnit= $this->getDoctrine()
      ->getRepository(Afsnit::class)
      ->findOneBy(['sks' => $request->getSession()->get('sks')]);

      $request->getSession()->set('dummy', $patient);

      if ($patient == null)
      {
        return $this->redirectToRoute('afsnit');
      }
      $entityManager = $this->getDoctrine()->getManager();


      $admission= new Admission();
      $admission->setActive(true);
      // $admission->setAdmitted(new DateTime());
      $admission->setPatient($request->getSession()->get('dummy'));
      $admission->setAfsnit($afsnit);
      $admission->setUser($this->security->getUser());

      $entityManager->persist($admission);
      $entityManager->flush();

      return $this->redirectToRoute('afsnit');

    }

    return $this->render('admission/index.html.twig', [
    'controller_name' => 'AdmissionController',
    'form' => $form->createView(),
    ]);
  }
}
