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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class NoteCollectionType extends AbstractType
{

  /**
  * {@inheritdoc}
  */

  public function getParent()
  {
    return CollectionType::class;
  }


  /**
  * {@inheritdoc}
  */

  public function getBlockPrefix()

  {
    return '';
  }
}