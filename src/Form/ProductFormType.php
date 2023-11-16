<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', TextType::class, [
                'attr'  => array(
                    'type'          => "text", 
                    'id'            => "label", 
                    'name'          => "label", 
                    'placeholder'   => "Name" 
                )
            ])
            ->add('description', TextareaType::class, [
                'attr' => array(
                    'type'          => "text", 
                    'id'            => "description", 
                    'name'          => "description", 
                    'placeholder'   => "Description"
                )
            ])
            ->add('image', TextType::class, [
                'attr' => array(
                    'type'          => "text", 
                    'id'            => "image", 
                    'name'          => "image", 
                    'placeholder'   => "Image Link"
                )
                ])
            ->add('price', IntegerType::class, [
                'attr' => array(
                    'type'          => "text", 
                    'id'            => "price", 
                    'name'          => "price", 
                    'placeholder'   => "42" 
                )
            ])
            ->add('category', EntityType::class, [
                'class'         => Category::class,
                'choice_label'  => 'label',
                'attr'          => array(
                    'required' => true
                )
            ])
            ->add('submit', SubmitType::class, [
            'label' => 'Create Product',
            'attr'  => ['class' => 'btn-primary']
            ]) 
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
