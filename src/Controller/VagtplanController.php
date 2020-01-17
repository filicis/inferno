<?php

/**
 *	inferno -
 *
 *	Brugernes indgang til vagtplanlægnings værktøjet
 * 	- Udgangspunktet er den aktuelle arbejdsplan
 *  - Herfra kan brugeren så navigere til f.eks ældre arbejdsplaner, kommende arbejdsplaner, rulleplan, ferieønsker mv.
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VagtplanController extends AbstractController
{
    /**
     * @Route("/vagtplan", name="vagtplan")
     */
    public function index()
    {
        return $this->render('vagtplan/index.html.twig', [
            'controller_name' => 'VagtplanController',
        ]);
    }
}
