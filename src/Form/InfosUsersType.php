<?php

namespace App\Form;

use App\Entity\InfosUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosUsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', null, [
                'label' => 'Nom :'
            ])
            ->add('firstName', null, [
                'label' => 'Prénom :'
            ])
            ->add('phoneNumber', null, [
                'label' => 'Téléphone :'
            ])
            ->add('number', null, [
                'label' => 'En général, nous sommes :'
            ])
            ->add('email', null, [
                'label' => 'Email :'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InfosUsers::class,
        ]);
    }
}
