<?php

namespace App\Form;

use App\Entity\Outils;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OutilsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('outil')
            ->add('description')
            ->add('image')            
            ->add('categories', EntityType::class, array(
                'class'=> Categories::class,
                'choice_label'=> "nom_categorie"
            ))
            ->add('prix')
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Outils::class,
        ]);
    }
}
