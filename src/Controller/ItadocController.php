<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ItadocController extends AbstractController
{
    /**
     * @Route("/itadoc", name="itadoc")
     */
    public function index()
    {
        return $this->render('itadoc/index.html.twig', [
            'controller_name' => 'ItadocController',
        ]);
    }
}
