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
          // Er brugeren logget på ?
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $afsnit= $session->get('afsnit');

        return $this->render('ita_document/index.html.twig', [
            'controller_name' => 'ItaDocumentController',
        ]);
    }
}
