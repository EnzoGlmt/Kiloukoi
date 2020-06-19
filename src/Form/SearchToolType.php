<?php

namespace App\Form;

use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchToolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $categorie=

        $builder
            ->add('outil', TextType::class, [
                'attr' => [
                    'placeholder' => 'Je recherche ...'
                ]
            ])

            ->add('categorie', EntityType::class, array(
                'class'=> Categories::class,
                'choice_label'=> "nom_categorie"
            ))


            ->add('lieu', TextType::class, [
                'attr' => [
                    'placeholder' => 'Je me trouve à ...'
                ]
            ])
            ->add('rayon', ChoiceType::class, [
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
