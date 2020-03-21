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
use App\Entity\Admisions;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class AdmissionController extends AbstractController
{

  /**
  * @Route("/admission", name="admission")
  */

  public function index(Request $request)
  {
    $defaultData = ["message" => "Indtast data"];
    $form= $this->createFormBuilder($defaultData)
    ->add('cpr', TextType::class)
    ->add('send', SubmitType::class)

    ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      // data is an array with "name", "email", and "message" keys
      $data = $form->getData();
      $value= $data['cpr'];

      $patient= $this->getDoctrine()
		  ->getRepository(Patient::class)
		  ->findOneBy(['cpr' => $value, ]);

		  $request->getSession()->set('dummy', $patient);

		  if ($patient == null)
		  {
		    return $this->redirectToRoute('afsnit');
		  }
		  $entityManager = $this->getDoctrine()->getManager();


      $admission= new Admisions();
      $admission->setCpr($request->getSession()->get('dummy'));
      $admission->setSks($request->getSession()->get('sks'));

      $entityManager->persist($admission);
      $entityManager->flush($request->getSession()->get('sks'));

		  return $this->redirectToRoute('afsnit');

    }

    return $this->render('admission/index.html.twig', [
    'controller_name' => 'AdmissionController',
    'form' => $form->createView(),
    ]);
  }
}
