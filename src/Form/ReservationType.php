<?php

namespace App\Form;

use App\Entity\Reservations;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('dateofreservation', DateType::class)
            // ->add('slotoftheday', TextType::class)
            // ->add('numberofpersons', IntegerType::class)
            // ->add('allergy', TextType::class)
            ->add('firstName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Prénom',
                ]
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                    ''
                ]
            ])
            ->add('phonenumber', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Téléphone',
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
