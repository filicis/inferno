<?php

namespace App\Form;

use App\Entity\Noter;
use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NyNoteType extends AbstractType
{
  	private $teksten = array ('Anamnese'=> '', 'CNS' => '', 'Pulm'=> '', 'Card'=> '' );

	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Anamnese', TextareaType::class, ['required' => False, ])
            ->add('Pulmonalt', TextareaType::class, ['required' => False, ])
            ->add('Cardielt', TextareaType::class, ['required' => False, ])
            ->add('Gastro', TextareaType::class, ['required' => False, ])
            ->add('Renalt', TextareaType::class, ['required' => False, ])
            ->add('Infektion', TextareaType::class, ['required' => False, ])
            ->add('Hematologisk', TextareaType::class, ['required' => False, ])
            ->add('Endocrinologisk', TextareaType::class, ['required' => False, ])
            ->add('Veske', TextareaType::class, ['required' => False, ])
            ->add('Andet', TextareaType::class, ['required' => False, ])
            ->add('Plan', TextareaType::class, ['required' => False, ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
         
        ]);
    }
}
