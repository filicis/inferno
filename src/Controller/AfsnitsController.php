<?php

//
//		AfsnitsController
//
//		Skal:		Vise et oversigtsbillede over indlagte i afsnittet
//						Tillade indlæggelser og udskrivelser
//						Kunne tildele sengepladser
//
//						Kunne vide et udskriftsvenligt billede med noter på samtlige indlagte
//

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AfsnitsController extends AbstractController
{

	  private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/afsnit", name="afsnit")
     */
    public function index()
    {
    	$teksten = array ('St 3-1' => '011244-2048  Tove Jensen', 
    										'St 3-2' => '123465-5194  Hans Larsen', 
    										'St 1-1' => '', 
    										'St 1-2' => '131548-1561  Birger Jensen',
    										'St 2-1' => '',
    										'St 2-2' => '213456-1545  Helle Madsen', 
    										'St 5'   => '', 
    										'St 6'   => '', 
    										'St 7'   => '181415-1478  Dolly Parton', 
    										'St 8'   => '', 
    										
    										);
    										
      $this->session->set('indlagte', $teksten);
    	
    	
        return $this->render('afsnits/index.html.twig', [
            'controller_name' => 'AfsnitsController',
        ]);
    }
}
