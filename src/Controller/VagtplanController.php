<?php

/**
 *	inferno -
 *
 *	Brugernes indgang til vagtplanl�gnings v�rkt�jet
 * 	- Udgangspunktet er den aktuelle arbejdsplan
 *  - Herfra kan brugeren s� navigere til f.eks �ldre arbejdsplaner, kommende arbejdsplaner, rulleplan, ferie�nsker mv.
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
