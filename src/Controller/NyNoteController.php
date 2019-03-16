<?php

namespace App\Controller;

use App\Form\NyNoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class NyNoteController extends AbstractController
{
	
	  private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
	
    /**
     * @Route("/nynote", name="ny_note")
     */
    public function index()
    {
    	$teksten = array ('Anamnese'=> 'Test1', 
    										'CNS' => 'Test2', 
    										'Pulm'=> 'Test3', 
    										'Card'=> 'Test4',
    										'Gas' => 'Test5',
    										'Ren' => 'Test6', );
    										
      $this->session->set('mydata', $teksten);
    										
    	
			$form= $this->createForm(NyNoteType::class);
    	
    	
    	$request = $this->render('ny_note/index.html.twig', ['our_form' => $form, 'our_form' => $form->createView(),
            'controller_name' => 'NyNoteController',
        ]);

			 if ($form->isSubmitted() && $form->isValid()) {
			 	        	$data= $form->getData();

        	
        }
        
        return $request;
    	
    }
}
