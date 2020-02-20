<?php

namespace App\Controller;

use App\Entity\Hospital;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HospitalController extends AbstractController
{
    /**
     * @Route("/admin/hospital", name="hospitaler")
     */
    public function oversigt()
    {
    	$repository = $this->getDoctrine()->getRepository(Hospital::class);
    	$hospitaler = $repository->findAll();

        return $this->render('hospital/index.html.twig', [
            'controller_name' => 'HospitalController', 'hospitaler' => $hospitaler
        ]);
    }


    /**
     * @Route("/admin/hospital/{sks}", name="hospital")
     */
    public function nyt($sks)
    {
    	$liste = array( 'Hospital 1' => '7001', 'Hospital 2' => '7002', 'Hospital 3' => '7003');

        return $this->render('hospital/nyt.html.twig', [
            'controller_name' => 'HospitalController', 'liste' => $liste
        ]);
    }
}
