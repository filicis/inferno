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


		$form = $this->createFormBuilder()
		->add('select', SubmitType::class , ['label' => 'Vælg'] )
		->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
      $afsnit= $afsnitsliste[$request->get('index')];
		  $session->set("sks", $afsnit->getSks());
			$session->set("afsnit", $afsnit);

			return $this->redirectToRoute('afsnit');
		}

		return $this->render('select_afsnit/index.html.twig', [
		'afsnitsliste' =>$afsnitsliste,
		'our_form' => $form->createView(),
		]);
	}
}
