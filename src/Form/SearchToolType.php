<?php

namespace App\Form;

use App\Entity\Outils;
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
                'choices' => [
                    "Dans un rayon de ... kms"=>0,
                    "Dans un rayon de 10 kms"=>1,
                    "Dans un rayon de 20 kms"=>2,
                    "Dans un rayon de 30 kms"=>3,
                    "Dans un rayon de 40 kms"=>4,
                    "Dans un rayon de 50 kms"=>5,
                    "Dans un rayon de 100 kms"=>6
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here 
            'data_class' => Outils::class,
        ]);
    }
}
