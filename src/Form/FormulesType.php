<?php

namespace App\Form;

use App\Entity\Formulas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('entreeanddish', null, ['label' => 'Entrée + Plat'])
            ->add('entreeanddessert', null, ['label' => 'Entrée + Dessert'])
            ->add('dishanddessert', null, ['label' => 'Plat + Dessert'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formulas::class,
        ]);
    }
}
