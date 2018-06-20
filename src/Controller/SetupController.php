<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SetupController extends Controller
{
    /**
     * @Route("/setup", name="setup")
     */
    public function index()
    {
        return $this->render('setup/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }
}
