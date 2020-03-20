<?php

namespace App\Controller;

use App\Entity\Patient;


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

		  if ($patient != null)
		  {
		    return $this->redirectToRoute('afsnit');
		  }



    }

    return $this->render('admission/index.html.twig', [
    'controller_name' => 'AdmissionController',
    'form' => $form->createView(),
    ]);
  }
}
