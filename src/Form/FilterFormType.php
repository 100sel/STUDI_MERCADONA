<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choices = [];
        foreach ($options['categories'] as $category) 
        {
            $choices[$category->getLabel()] = $category->getId();
        }

        $builder
            ->add('categories', ChoiceType::class, [
                'choices'  => $choices,
                'multiple' => true,  
                'expanded' => true, 
                'label'    => 'Categories:',
                'required' => false,
                'attr'     => [
                    'class' => '' 
                ]
            ])
            ->add('submit', SubmitType::class, [
            'label' => 'Apply Filters',
            'attr'  => ['class' => 'btn-primary'] 
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'categories' => []
        ]);
    }
}
