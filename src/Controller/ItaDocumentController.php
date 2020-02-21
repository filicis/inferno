<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ItaDocumentController extends AbstractController
{
    /**
     * @Route("/itadoc", name="ita_document")
     */

    public function index(SessionInterface $session)
    {
      $tekst= array(
        "Klokken",
        "Morfin (mg/iv)",
        "Toradol mg/iv",
        "Oxynorm mg/iv",
        "Pethidin mg/iv",
        "DHB mg/ml",
        "Ondansetron mg/iv",
        "Caps Oxynorm mg",
        "T Paracetamol",
        "",
        "",
        "VAS Score", 
        "EPI ml/t",
        "PCA",
        "Timediurese",  
        "Oxygen",
        "Saturation",
        "Kvalme",
        "Forbinding",
        "Blødning"    
         
        );  
        
          // Er brugeren logget på ?
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $afsnit= $session->get('afsnit');

        return $this->render('ita_document/index.html.twig', [
            'controller_name' => 'ItaDocumentController',
            'tekst' => $tekst,
        ]);
    }
}
