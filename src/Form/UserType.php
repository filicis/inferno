<?php

/**
 * 	Brugerregistrering
 *
 *  Opsætter basale brugeroplysninger
 *  - Brugernavn
 *    Navn
 *    Password
 *    Email
 */

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('username', TextType::class)
		->add('navn', TextType::class)
		->add('plainPassword', repeatedType::class, array(
		'type' => PasswordType::class,
		'first_options' => array('label' => 'Password'),
		'second_options' => array('label' => 'Repeat Password'),
		))
		->add('email', EmailType::class)
		->add('is_active')
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
		'data_class' => User::class,
		]);
	}
}
