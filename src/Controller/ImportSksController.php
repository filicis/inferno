<?php

//	SYSADM		Importer SKS Sygehusafdelingsklassifikationen fra CSV-fil
//
//	Selve klassifikationen henter SYSADM hjem fra Sundhedsdatastyrelsens SKS Dumper side
//	CSV-filen importeres så til Inferno

namespace App\Controller;

use App\Form\ImportSksType;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//
//
//

class ImportSksController extends AbstractController
{
    /**
     * @Route("/sysadm/importsks", name="import_sks")
     */
    public function index()
    {
    	  $form1= $this->createForm(ImportSksType::class);


        $request = $this->render('import_sks/index.html.twig', ['our_form' => $form1, 'our_form' => $form1->createView(),
            'controller_name' => 'ImportSksController',
        ]);

        if ($form1->isSubmitted() && $form1->isValid()) {
        	$data= $form1->getData();

        	return $this->redirect($this->generateUrl('/'));
        }

        return $request;
    }
}
