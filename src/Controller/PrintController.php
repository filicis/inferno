<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrintController extends AbstractController
{
    /**
     * @Route("/itadoc/print", name="udprint")
     */
    public function index()
    {
        return $this->render('print/index.html.twig', [
            'controller_name' => 'PrintController',
        ]);
    }
}
