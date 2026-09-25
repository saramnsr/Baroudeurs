<?php

namespace App\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Un jour de l'itinéraire : titre + détail.
 */
final class ItineraryDayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du jour',
                'attr' => ['maxlength' => 255, 'placeholder' => 'Ex : Douz - Dhirat Aicha'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le titre du jour est obligatoire.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('detail', TextareaType::class, [
                'label' => 'Détail du jour',
                'required' => false,
                'attr' => ['rows' => 3],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['translation_domain' => false]);
    }
}