<?php

/**
 *	inferno
 *
 *	Skemal�ggerens indgang til skemal�gningsv�rkt�jet
 * 	- 
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RosteringController extends Controller
{
    /**
     * @Route("/rostering", name="rostering")
     */
    public function index()
    {
        return $this->render('rostering/index.html.twig', [
            'controller_name' => 'RosteringController',
        ]);
    }
}
