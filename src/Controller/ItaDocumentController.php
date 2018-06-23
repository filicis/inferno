<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItaDocumentController extends Controller
{
    /**
     * @Route("/itadoc", name="ita_document")
     */
     
    public function index()
    {
        return $this->render('ita_document/index.html.twig', [
            'controller_name' => 'ItaDocumentController',
        ]);
    }
}
