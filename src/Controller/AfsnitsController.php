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

use App\Entity\Afsnit;

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

    $afsnit= $this->getDoctrine()
    ->getRepository(Afsnit::class)
    ->findOneBy(['sks' => $sks]);


    $admission= $afsnit->getAdmissions();

    // Et tomt afsnit uden indlagte patienter kræver særskilt billede

    if ($admission == null)
    {
      return $this->render('afsnits/index1.html.twig', [
      'afsnit' => $afsnit,
      ]);
    }

    $nlayout= ["Anamnese", "CNS", "Pulm", "Card",];

    $slayout= ["St 3-1", "St 3-2", "St 1-1", "St 1-2",];



    $p=  $afsnit->getBeds();
    if (isset($p) == true)
    {
      foreach ($p as $value)
      {
        $pliste[$value]= null;
      }
    }

    $i= 0;
    foreach ($admission as $value)
    {
      // $pliste[$value->getBed()]= $value->getPatient()->getCprN() . " - " . $value->getPatient()->getNavn();
      $pliste[$value->getBed()]= $i++;

    }


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
    'indlagte' => $pliste,
    'mydata' => $teksten,
    'afsnit' => $afsnit,
    'nlayout' => $nlayout,
    'slayout' => $slayout,
    'admission' => $admission,
    ]);
  }
}
