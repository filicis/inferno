<?php

namespace App\Form;

use App\Entity\Afsnit;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class AfsnitType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('sks')
    ->add('kortnavn')
    ->add('navn')
    //->add('oprettet')
    ->add('beds', TextType::class)
    ->add('notefelter', TextType::class)
    //->add('afdeling')
    ;


    $builder->get('beds')
      ->addModelTransformer(new CallbackTransformer(
        function ($bedsAsArray) {
          // transform the array to a string
          return json_encode($bedsAsArray);
        },
        function ($bedsAsString) {
          // transform the string back to an array
          return json_decode($bedsAsString);
        }
      ));

    $builder->get('notefelter')
      ->addModelTransformer(new CallbackTransformer(
        function ($notefelterAsArray) {
          // transform the array to a string
          return json_encode($notefelterAsArray);
        },
        function ($notefelterAsString) {
          // transform the string back to an array
          return json_decode($notefelterAsString);
        }
      ));

  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(['data_class' => Afsnit::class,]);
  }
}
