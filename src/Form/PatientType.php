<?php

namespace App\Form;

use App\Entity\Illness;
use App\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('parent_first_name')
            ->add('parent_last_name')
            ->add('email')
            ->add('age')
            ->add('sex', ChoiceType::class, [
                'choices'  => ['male' => 'male', 'female' => 'female',]
            ])
            ->add('phone_number')
            ->add('illness', EntityType::class, [
                'class' => Illness::class,
                'choice_label' => 'name',
                'required' => true,
            ])
            ->add('comments', TextareaType::class)
            ->add('residence')
            ->add('parent_occupation')
            ->add('parent_comments', TextareaType::class)
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Normal' => 'Normal',
                    'Ill' => 'Ill',
                    'Fair' => 'Fair',
                    'Good' => 'Good',
                    'Worse' => 'Worse',
                    'Better' => 'Better',
                    'Unknown' => 'Unknown'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
