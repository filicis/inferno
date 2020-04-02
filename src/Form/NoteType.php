<?php


/*
* This file is part of the Inferno package.
*
* (c) Michael Lindhardt Rasmussen <mlr@dadlnet.dk>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/


namespace App\Form;

use App\Entity\Noter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class NoteType extends AbstractType
{


  /**
  * {@inheritdoc}
  */

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('values', CollectionType::class, ['entry_type' => TextareaType::class,
          //'label_format' => 'form[keys][%name%]',
          //'prototype_name' => 'holger',
          'entry_options' => ['block_prefix' => 'dummy1', 'attr' => ['class' => 'form-control', 'rows' => '2', 'name' => 'dummy']]])


          ;

  }

  /**
  * {@inheritdoc}
  */

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
    'data_class' => Noter::class,
    ]);
  }



}