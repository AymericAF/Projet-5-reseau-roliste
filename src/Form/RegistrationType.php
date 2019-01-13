<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('username', TextType::class, array(
                    'required' => true,
                ))
                ->add('email', EmailType::class)
                ->add('password', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options'  => array('label' => 'Mot de passe : '),
                    'second_options' => array('label' => 'Confirmation du mot de passe : '),
                    'invalid_message' => 'Le mot de passe et sa confirmation doivent être identique.',
                ))
                ->add('country', CountryType::class)
                ->add('postalCode')
                ->add('city')
                ->add('gpsLat')
                ->add('gpsLong')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
