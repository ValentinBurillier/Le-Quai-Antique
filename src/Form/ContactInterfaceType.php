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
                'label' => 'Téléphone'
                ])
            ->add('email', null, [
                'label' => 'E-mail'
                ])
            ->add('facebook', null, [
                'label' => 'Facebook'
                ])
            ->add('instagram', null, [
                'label' => 'Instagram'
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
