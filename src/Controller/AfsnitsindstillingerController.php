<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extensions\IntlExtension;

use App\Entity\Afsnit;
use App\Form\AfsnitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AfsnitsindstillingerController extends AbstractController
{

 	private $session;

	public function __construct(SessionInterface $session)
	{
		$this->session = $session;
	}

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

    /**
     * @Route("/admin/afsnitsindstillinger1", name="afsnitsindstillinger1")
     */
    public function index1(Request $request)
    {
      $defaultData = ['message' => 'Type your message here'];

      $nlayout= ["Anamnese", "CNS", "Pulm", "Card",];

      $slayout= ["St 3-1", "St 3-2", "St 1-1", "St 1-2",];


      $sks= $this->session->get('sks');

		  if ($sks == null)
		    return $this->redirectToRoute('selectafsnit');

      $afsnit= $this->getDoctrine()
		    ->getRepository(Afsnit::class)
		    ->findOneBy(['sks' => $sks]);

      $form = $this->createFormBuilder($defaultData)
          ->add('sks', TextType::class)
          ->add('navn', TextType::class)
          ->add('kortnavn', TextType::class)
          ->add('slayout', TextareaType::class)
          ->add('nlayout', TextareaType::class)
          ->add('send', SubmitType::class)
          ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        // data is an array with "name", "email", and "message" keys
         $data = $form->getData();
      }



        return $this->render('afsnitsindstillinger/index1.html.twig', [
            'controller_name' => 'AfsnitsindstillingerController',
            'afsnit' => $afsnit,
            'nlayout' => json_encode($nlayout),
		        'slayout' => json_encode($slayout),

        ]);
    }
    /**
     * @Route("/admin/afsnitsindstillinger2", name="afsnitsindstillinger2")
     */
    public function index2(Request $request)
    {
      $defaultData = ['message' => 'Type your message here'];

      $nlayout= ["Anamnese", "CNS", "Pulm", "Card",];

      $slayout= ["St 3-1", "St 3-2", "St 1-1", "St 1-2",];


      $sks= $this->session->get('sks');

		  if ($sks == null)
		    return $this->redirectToRoute('selectafsnit');

      $afsnit= $this->getDoctrine()
		    ->getRepository(Afsnit::class)
		    ->findOneBy(['sks' => $sks]);

      $form = $this->createForm(AfsnitType::class, $afsnit);


      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

			  $entityManager = $this->getDoctrine()->getManager();
			  $entityManager->persist($afsnit);
			  $entityManager->flush();

      }



        return $this->render('afsnitsindstillinger/index2.html.twig', [
            'form' => $form->createView(),
            'afsnit' => $afsnit,
            'form1' => $form,
            'nlayout' => json_encode($nlayout),
		        'slayout' => json_encode($slayout),

        ]);
    }



}
