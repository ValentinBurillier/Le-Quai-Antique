<?php

namespace App\Form;

use App\Entity\ContactRestaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactInterfaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('phonenumber', null, [
                'label' => 'Téléphone',
                'attr' => ['placeholder' => 'test']
                ])
            ->add('email', null, [
                'label' => 'E-mail',
                'attr' => ['placeholder' => 'test']
                ])
            ->add('facebook', null, [
                'label' => 'Facebook',
                'attr' => ['placeholder' => 'test']
                ])
            ->add('instagram', null, [
                'label' => 'Instagram',
                'attr' => ['placeholder' => 'test']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactRestaurant::class,
        ]);
    }
}
