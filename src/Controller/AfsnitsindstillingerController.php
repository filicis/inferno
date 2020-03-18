<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extensions\IntlExtension;


use App\Entity\Afsnit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AfsnitsindstillingerController extends AbstractController
{
    /**
     * @Route("/admin/afsnitsindstillinger", name="afsnitsindstillinger")
     */
    public function index()
    {
        $afsnit= $this->getDoctrine()
		  ->getRepository(Afsnit::class)
		  ->findAll();


        return $this->render('afsnitsindstillinger/index.html.twig', [
            'controller_name' => 'AfsnitsindstillingerController',
            'afsnit' => $afsnit,
        ]);
    }
}
