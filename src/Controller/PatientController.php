<?php

//		PatientController
//
//

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="patient")
     */
    public function ny()
    {
    	$patient= new Patient();
    	
    	$form= $this->createForm(PatientType::class, $patient);
    	
    	 $request = $this->render('patient/index.html.twig', ['our_form' => $form, 'our_form' => $form->createView(),
            'controller_name' => 'PatientController',
        ]);
        
        if ($form->isSubmitted() && $form->isValid()) {
        	$data= $form->getData();
        	
        	return $this->redirect($this->generateUrl('/'));
        }
        
        return $request;
    	
    }
}
