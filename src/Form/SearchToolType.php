<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SearchToolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('outil', TextType::class, [
                'attr' => [
                    'placeholder' => 'Je recherche ...'
                ]
            ])

            ->add('categorie', SelectType::class, [
                'attr' => [
                    'placeholder' => 'Dans la catégorie...'
                ]

            ])
            ->add('lieu', TextType::class, [
                'attr' => [
                    'placeholder' => 'Je me trouve à ...'
                ]
            ])
            ->add('rayon', SelectType::class, [
                'attr'=> [
                    'placeholder' => 'Dans un rayon de ... kms'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here 
            'data_class' => SearchToolType::class,
        ]);
    }
}
