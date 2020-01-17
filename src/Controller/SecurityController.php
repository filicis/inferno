<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */

 public function login(Request $request, AuthenticationUtils $authUtils)
    {

    // get the login error if there is one
    $error = $authUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authUtils->getLastUsername();

    $form = $this->createForm(LoginType::class);

    $form->get('_username')->setData($lastUsername);

    // return $this->render('security/login.html.twig', array('last_username' => $lastUsername, 'error' => $error, ));

    return $this->render('security/login.html.twig', ['our_form' => $form, 'our_form' => $form->createView(),'last_username' => $lastUsername, 'error' => $error, ]);


    }


}
