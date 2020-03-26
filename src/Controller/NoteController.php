<?php

namespace App\Controller;

use App\Entity\Afsnit;
use App\Entity\Admission;
use App\Entity\Noter;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class NoteController extends AbstractController
{
  /**
  * @Route("/note/{id}", name="note")
  *
  **/

  public function index(int $id= 1, Request $request)
  {
    //
    // Først henter vi aktuelle Afsnit (efter Session variablen SKS)
    //

    $sks= $request->getsession()->get('sks');

    if ($sks == null)
    return $this->redirectToRoute('selectafsnit');

    $afsnit= $this->getDoctrine()
    ->getRepository(Afsnit::class)
    ->findOneBy(['sks' => $sks]);

    //
    // Så henter vi aktuelle Admission
    //

    $admission= $this->getDoctrine()
    ->getRepository(Admission::class)
    ->find($id);

    //
    //  Vi opretter en ny Note
    //

    $teksten = array ('Anamnese'=> 'Kort anamnese med baggrunden for opholdet',
    'CNS' => 'Test2',
    'Pulm'=> 'Test3',
    'Card'=> 'Test4',
    'Gas' => 'Test5',
    'Ren' => 'Test6',
    'Inf' => "Infektionsmæssig status",
    "Hæm" => 'Infektionsmæssig status',
    'Endo' => 'Test7',
    'Væske' => 'Væskestatus',
    'Andet' => 'Andre problemstillinger',
    'Plan' => 'Plan for kommende vagtperiode' );



    $defaultData = ['message' => 'Type your message here'];
    $form= $this->createFormBuilder($defaultData)
    //->add('tekst', CollectionType::class, ['entry_type' => TextareaType::class])
    ->add('cpr', TextType::class, ['mapped' => false] )
    ->add('Send', SubmitType::class)
    ->getForm();

    $form->handleRequest($request);


    if ($form->isSubmitted() && $form->isValid())
    {
      $data= $form->getData();

      $note= new Noter();
      $note->setForfatter("micras");
      $note->setPatient($admission->getPatient());

      $note->setTekst($data);
      //$note->setTekst($teksten);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($note);
      $entityManager->flush();
      return $this->redirectToRoute('afsnit');

    }

    return $this->render('note/index.html.twig', [
    'controller_name' => 'NoteController',
    'afsnit' => $afsnit,
    'admission' => $admission,
    'form' => $form->createView(),
    'noter' => $teksten,
    ]);
  }
}
