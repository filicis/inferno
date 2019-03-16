<?php

//	SYSADM		Importer SKS Sygehusafdelingsklassifikationen fra CSV-fil
//
//	Selve klassifikationen henter SYSADM hjem fra Sundhedsdatastyrelsens SKS Dumper side
//	CSV-filen importeres så til Inferno

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
// use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImportSksType extends AbstractType
{
	private $_file= 'test.txt'; 
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	
        $builder
            ->add('_file', FileType::class, ['label' => "Fil:", 'help' => 'En hjælpetekst', ] )
            ->add('_ignorer', NumberType::class, ['label' => "Start Linie:", 'data' => '5',] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
