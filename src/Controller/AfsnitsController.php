<?php

	/**
	 *
	 * AfsnitsController
   *
	 * Skal:		Vise et oversigtsbillede over indlagte i afsnittet
	 *					Tillade indlæggelser og udskrivelser
	 *					Kunne tildele sengepladser
   *
	 *					Kunne vise et udskriftsvenligt billede med noter på samtlige indlagte
	 **/

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AfsnitsController extends AbstractController
{

	private $session;

	public function __construct(SessionInterface $session)
	{
		$this->session = $session;
	}

	/**
	 *
	 * 	@Route("/afsnit", name="afsnit")
	 **/
	public function index(Request $request)
	{
		$sks= $this->session->get('sks');

		if ($sks == null)
		  return $this->redirectToRoute('selectafsnit');


		$pliste=   array ('St 3-1' => '011244-2048  Tove Jensen',
		'St 3-2' => '123465-5194  Hans Larsen',
		'St 1-1' => '',
		'St 1-2' => '131548-1561  Birger Jensen',
		'St 2-1' => '',
		'St 2-2' => '213456-1545  Helle Madsen',
		'St 5'   => '',
		'St 6'   => '',
		'St 7'   => '181415-1478  Dolly Parton',
		'St 8'   => '',

		);

		$teksten = array ('Anamnese:'=> 'Kort anamnese med baggrunden for opholdet',
		'CNS:' => 'Test2',
		'Pulm:'=> 'Test3',
		'Card:'=> 'Test4',
		'Gas:' => 'Test5',
		'Ren' => 'Test6',
		'Inf:' => 'Infektionsmæssig status',
		'Hæm:' => 'Infektionsmæssig status',
		'Endo:' => 'Test7',
		'Væske:' => 'Væskestatus',
		'Andet:' => 'Andre problemstillinger',
		'Plan:' => 'Plan for kommende vagtperiode' );




		return $this->render('afsnits/index.html.twig', [
		'controller_name' => 'AfsnitsController',
		'indlagte' => $pliste,
		'mydata' => $teksten,
		]);
	}
}
