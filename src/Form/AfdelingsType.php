<?php

namespace App\Form;

use App\Entity\Afdeling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfdelingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sks')
            ->add('navn')
            //->add('is_active')
            ->add('area')
            ->add('institution')
            //->add('oprettet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Afdeling::class,
        ]);
    }
}
