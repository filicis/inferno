<?php


/*
* This file is part of the Inferno package.
*
* (c) Michael Lindhardt Rasmussen <mlr@dadlnet.dk>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/


namespace App\Form\Type;

use App\Entity\Afsnit;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class AfsnitType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('sks', TextType::class, ['attr' => ['class' => 'form-control', ]])
    ->add('kortnavn', TextType::class, ['attr' => ['class' => 'form-control', ]])
    ->add('navn', TextType::class, ['attr' => ['class' => 'form-control', ]])
    //->add('oprettet')
    ->add('beds', TextareaType::class, ['attr' => ['class' => 'form-control', 'rows' => '3',]] )
    ->add('notefelter', TextareaType::class, ['attr' => ['class' => 'form-control', 'rows' => '3',]])
    //->add('afdeling')
    ;


    $builder->get('beds')
      ->addModelTransformer(new CallbackTransformer(
        function ($bedsAsArray) {
          // transform the array to a string
          return json_encode($bedsAsArray, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
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
          return json_encode($notefelterAsArray, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
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
