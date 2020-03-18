<?php

/**
*	SelectAfsnitController
*
* 	Lader brugeren vælge et af de afsnit vedkommende er tilknyttet
*	 - Det valgte afsnit gemmes i session objektet som 'sks'
*
**/

namespace App\Controller;

use App\Entity\Afsnit;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class SelectAfsnitController extends AbstractController
{

	/**
	 *
	 * @Route("/itadoc/afsnit", name="selectafsnit")
	 *
	 **/
	public function index(Request $request, SessionInterface $session)
	{
    $afsnitsliste= $this->getDoctrine()
		  ->getRepository(Afsnit::class)
		  ->findAll();




		$afsnit=   array ('sks001' => 'Intensiv Afsnit Andeby',
		'sks002' => 'Intensiv Afsnit Korsbæk',
		'sks003' => 'Intensive Senge RHE',
		'sks004' => 'Intensive Senge RHL',
		'sks005' => 'Intensiv Afsnit Gåseby',

		);

		$form = $this->createFormBuilder($afsnit)
		->add('select', SubmitType::class , ['attr' => ['label' => 'Vælg']] )
		->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			// Gemmer brugeren valg i Session, og hopper videre til Afsnit

			$session->set("sks", $request->request->get('sks'));
			return $this->redirectToRoute('afsnit');
		}

		return $this->render('select_afsnit/index.html.twig', [
		'controller_name' => 'SelectAfsnitController',
		'afsnit' => $afsnit,
		'afsnitsliste' =>$afsnitsliste,
		'our_form' => $form,
		'our_form' => $form->createView(),
		]);
	}
}
