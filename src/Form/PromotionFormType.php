<?php

namespace App\Form;

use App\Entity\Promotion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('discount', IntegerType::class, [
                'label' => 'Discount %',
                'attr'=> [
                    'type'          => 'text',
                    'id'            => 'discount',
                    'name'          => 'discount',
                    'placeholder'   => '50'
                ]
            ])
            ->add('startDate', DateType::class, [
                'attr' => [
                    'class' => 'grid',
                    'id'    => 'startDate',
                    'name'  => 'startDate'                ]
            ])
            ->add('endDate', DateType::class, [
                'attr' => [
                    'class' => 'grid',
                    'id'    => 'endDate',
                    'name'  => 'endDate'
                ]
            ])
            ->add('submit', SubmitType::class, [
            'label' => 'Apply Promotion',
            'attr'  => ['class' => 'btn-primary']
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
