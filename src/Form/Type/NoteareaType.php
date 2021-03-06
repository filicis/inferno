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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class NoteareaType extends AbstractType
{

  /**
  * {@inheritdoc}
  */

  public function getParent()
  {
    return TextareaType::class;
  }


  /**
  * {@inheritdoc}
  */

  public function getBlockPrefix()

  {
    return '';
  }
}