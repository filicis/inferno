<?php

namespace App\Controller;

use App\Form\AfdelingsType;
use App\Entity\Afdeling;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminAfdelingController extends AbstractController
{
    /**
     * @Route("/admin/afdeling", name="admin_afdeling")
     */

        public function registerAfdeling(Request $request)
    {
        // 1) build the form
        $afdeling = new Afdeling();
        $form = $this->createForm(AfdelingsType::class, $afdeling);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($afdeling);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('main');
        }

        return $this->render(
            'admin_afdeling/index.html.twig',
            array('form' => $form->createView())
        );
    }

    public function index()
    {
        return $this->render('admin_afdeling/index.html.twig', [
            'controller_name' => 'AdminAfdelingController',
        ]);
    }
}
