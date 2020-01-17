<?php

/**
 *	inferno
 *
 * 	Design og vedligehold af rulleplaner
 *
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RulleplanController extends AbstractController
{
    /**
     * @Route("/rulleplan", name="rulleplan")
     */
    public function index()
    {
        return $this->render('rulleplan/index.html.twig', [
            'controller_name' => 'RulleplanController',
        ]);
    }
}
