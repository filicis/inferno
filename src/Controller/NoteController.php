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

    $teksten = array ('Anamnese:'=> 'Kort anamnese med baggrunden for opholdet',
    'CNS:' => 'Test2',
    'Pulm:'=> 'Test3',
    'Card:'=> 'Test4',
    'Gas:' => 'Test5',
    'Ren' => 'Test6',
    'Inf:' => 'Infektionsmæssig status',
    'Hem:' => 'Infektionsmæssig status',
    'Endo:' => 'Test7',
    'Veske:' => 'Væskestatus',
    'Andet:' => 'Andre problemstillinger',
    'Plan:' => 'Plan for kommende vagtperiode' );



    $note= new Noter();
    $note->setTekst($teksten);
    $note->setPatient($admission->getPatient());

    $form= $this->createFormBuilder($note)
      ->add('tekst', CollectionType::class, ['entry_type' => TextareaType::class])
      ->add('Send', SubmitType::class)
      ->getForm();

    if ($form->isSubmitted() && $form->isValid()) {
  }

    return $this->render('note/index.html.twig', [
    'controller_name' => 'NoteController',
    'afsnit' => $afsnit,
    'admission' => $admission,
    'form' => $form->createView(),
    ]);
  }
}
