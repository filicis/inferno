<?php

	/**
	 *	BrugereController
   *
	 *	Systemadministrators indgang til Brugerhåndtering
   *
	 *	Opstartsbilledet er en liste over samtlige brugere
	 *	- Med mulighed for at tilføje, redigere og fjerne brugere.
	 **/

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;



class BrugereController extends AbstractController
{
	/**
	* @Route("/admin/brugere", name="brugere")
	*/

	public function index()
	{

		$brugere= $this->getDoctrine()
		  ->getRepository(User::class)
		  ->findAll();


		return $this->render('brugere/index.html.twig', [
		'controller_name' => 'BrugereController',
		'brugere' => $brugere,
		]);
	}
}



