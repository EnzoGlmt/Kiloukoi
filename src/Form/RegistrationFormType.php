<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Rollerworks\Component\PasswordStrength\Validator\Constraints\PasswordStrength;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('prenom', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Mon prénom'
            ]
        ])

        ->add('nom', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Mon nom'
            ]
        ])

        ->add('adresse', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Mon adresse'
            ]
        ])

        ->add('telephone', TextType::class, [
            'required'=> false,
            'label' => false,
            'attr' => [
                'placeholder' => "Mon numéro de téléphone (si j'en ai envie...)"
            ]
        ])


            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Mon adresse mail'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Eh oui ! Vous devez accepter nos termes et conditions',
                    ]),
                ],
                'label' => "Merci d'accepter nos termes et conditions"
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un mot de passe',
                    ]),
                    // new Length([
                    //     'min' => 6,
                    //     'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                    //     // max length allowed by Symfony for security reasons
                    //     'max' => 4096,
                    // ]),
                    new PasswordStrength([
                        // longeur mini
                        'minLength' => 8,
                        'tooShortMessage' => 'Pour des raisons de sécurité, le mot de passe doit contenir au moins 8 caractères',
                        // force mini
                        'minStrength' => 4,
                        'message' => 'Pour des raisons de sécurité, le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial'
                    ])
                ],
                'attr' => [                
                    'placeholder' => 'Je choisi un super mot de passe compliqué'
                ],
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
