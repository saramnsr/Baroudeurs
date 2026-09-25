<?php

namespace App\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Formulaire circuit / excursion (saisie en français uniquement).
 */
final class TripType extends AbstractType
{
    private const IMAGE_ACCEPT = 'image/jpeg,image/png,image/webp';
    private const MAX_IMAGES = 20;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Règles communes à toutes les images
        $image = new Assert\Image([
            'maxSize' => '10M',
            'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp'],
            'mimeTypesMessage' => 'Formats acceptés : JPG, PNG ou WebP.',
            'maxSizeMessage' => 'Image trop lourde (10 Mo maximum).',
        ]);

        // Texte d'une étiquette ajoutée à la main
        $customTag = [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['max' => 255]),
            ],
        ];

        $builder
            // ===== Informations générales =====
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['maxlength' => 255, 'placeholder' => 'Ex : Rose de Sables - 8 Jours'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le titre est obligatoire.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('duration', TextType::class, [
                'label' => 'Durée',
                'attr' => ['maxlength' => 100, 'placeholder' => 'Ex : 8 jours / 7 nuits'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La durée est obligatoire.']),
                    new Assert\Length(['max' => 100]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description courte',
                'help' => 'Affichée sur la carte de la page Circuits (2 à 3 phrases).',
                'attr' => ['rows' => 3, 'maxlength' => 600],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La description courte est obligatoire.']),
                    new Assert\Length(['max' => 600]),
                ],
            ])
            ->add('fullDescription', TextareaType::class, [
                'label' => 'Description longue',
                'help' => 'Affichée au début de la page détail.',
                'attr' => ['rows' => 6],
                'constraints' => [new Assert\NotBlank(['message' => 'La description longue est obligatoire.'])],
            ])

            // ===== Images (une seule zone) =====
            ->add('images', FileType::class, [
                'label' => 'Images',
                'multiple' => true,
                'attr' => ['accept' => self::IMAGE_ACCEPT, 'class' => 'admin-dropzone__input'],
                'constraints' => [
                    new Assert\Count([
                        'min' => 2,
                        'max' => self::MAX_IMAGES,
                        'minMessage' => 'Ajoutez au moins 2 images.',
                        'maxMessage' => sprintf('%d images maximum.', self::MAX_IMAGES),
                    ]),
                    new Assert\All([$image]),
                ],
            ])
            // Position de l'image principale (choisie avec ★)
            ->add('mainImageIndex', HiddenType::class, [
                'attr' => ['data-main-index' => ''],
            ])

            // ===== Itinéraire complet =====
            ->add('itinerarySummary', TextareaType::class, [
                'label' => "Description de l'itinéraire",
                'help' => 'Courte description affichée au-dessus des jours.',
                'required' => false,
                'attr' => ['rows' => 3],
            ])
            ->add('itinerary', CollectionType::class, [
                'label' => false,
                'entry_type' => ItineraryDayType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'constraints' => [new Assert\Count(['min' => 1, 'minMessage' => 'Ajoutez au moins un jour.'])],
            ])

            // ===== Inclus / Non inclus (étiquettes) =====
            ->add('includedItems', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'multiple' => true,
                'expanded' => true,
                'choices' => self::tagChoices(TripChoices::INCLUDED),
                'choice_attr' => static fn ($choice): array => ['data-icon' => TripChoices::INCLUDED[$choice] ?? ''],
            ])
            ->add('includedCustom', CollectionType::class, [
                'label' => false,
                'entry_type' => TextType::class,
                'entry_options' => $customTag,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
            ])
            ->add('excludedItems', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'multiple' => true,
                'expanded' => true,
                'choices' => self::tagChoices(TripChoices::EXCLUDED),
                'choice_attr' => static fn ($choice): array => ['data-icon' => TripChoices::EXCLUDED[$choice] ?? ''],
            ])
            ->add('excludedCustom', CollectionType::class, [
                'label' => false,
                'entry_type' => TextType::class,
                'entry_options' => $customTag,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
            ])

            // ===== Avis client (optionnel) =====
            ->add('reviewName', TextType::class, [
                'label' => 'Nom du client',
                'required' => false,
                'attr' => ['maxlength' => 255],
            ])
            ->add('reviewCountry', TextType::class, [
                'label' => 'Pays',
                'required' => false,
                'attr' => ['maxlength' => 255],
            ])
            ->add('reviewRating', ChoiceType::class, [
                'label' => 'Note',
                'required' => false,
                'placeholder' => '—',
                'choices' => ['★★★★★ (5)' => 5, '★★★★ (4)' => 4, '★★★ (3)' => 3, '★★ (2)' => 2, '★ (1)' => 1],
            ])
            ->add('reviewComment', TextareaType::class, [
                'label' => 'Commentaire',
                'required' => false,
                'attr' => ['rows' => 3],
            ])
            ->add('reviewAvatar', FileType::class, [
                'label' => 'Photo du client',
                'required' => false,
                'attr' => ['accept' => self::IMAGE_ACCEPT, 'data-preview' => 'single'],
                'constraints' => [$image],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'translation_domain' => false,
            'constraints' => [
                new Assert\Callback([self::class, 'validateMainImage']),
                new Assert\Callback([self::class, 'validateReview']),
            ],
        ]);
    }

    // Étiquettes : le texte sert de libellé et de valeur
    private static function tagChoices(array $catalog): array
    {
        $texts = array_keys($catalog);

        return array_combine($texts, $texts);
    }

    // L'image principale doit faire partie des images envoyées
    public static function validateMainImage($data, ExecutionContextInterface $context): void
    {
        $images = is_array($data) ? ($data['images'] ?? []) : [];
        if (count($images) === 0) {
            return; // Déjà signalé par "Ajoutez au moins 2 images"
        }

        $index = $data['mainImageIndex'] ?? null;
        if (!is_numeric($index) || (int) $index < 0 || (int) $index >= count($images)) {
            $context->buildViolation("Choisissez l'image principale (★).")->atPath('[images]')->addViolation();
        }
    }

    // Si un nom de client est saisi, le commentaire et la note deviennent obligatoires
    public static function validateReview($data, ExecutionContextInterface $context): void
    {
        if (!is_array($data) || trim((string) ($data['reviewName'] ?? '')) === '') {
            return;
        }

        if (trim((string) ($data['reviewComment'] ?? '')) === '') {
            $context->buildViolation('Ajoutez le commentaire du client.')->atPath('[reviewComment]')->addViolation();
        }

        if (empty($data['reviewRating'])) {
            $context->buildViolation('Choisissez une note.')->atPath('[reviewRating]')->addViolation();
        }
    }
}