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
                // Sur la page "modifier", ce champ est optionnel : l'admin peut
                // ne rien ré-uploader et garder les images existantes.
                'required' => false,
                'attr' => ['accept' => self::IMAGE_ACCEPT, 'class' => 'admin-dropzone__input'],
                'constraints' => [
                    new Assert\Count([
                        'max' => self::MAX_IMAGES,
                        'maxMessage' => sprintf('%d images maximum.', self::MAX_IMAGES),
                    ]),
                    new Assert\All([$image]),
                ],
            ])
            // Position de l'image principale (add : index dans "images")
            ->add('mainImageIndex', HiddenType::class, [
                'required' => false,
                'attr' => ['data-main-index' => ''],
            ])
            // Images déjà présentes (JSON) — utilisé uniquement en édition
            ->add('existingImages', HiddenType::class, [
                'required' => false,
                'attr' => ['data-existing-images' => ''],
            ])
            // Identifiant de l'image principale en édition :
            //   "existing:0", "existing:2", "new:0", "new:3"…
            ->add('mainImageKey', HiddenType::class, [
                'required' => false,
                'attr' => ['data-main-key' => ''],
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
                'placeholder' => false,
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    '5 étoiles' => 5,
                    '4 étoiles' => 4,
                    '3 étoiles' => 3,
                    '2 étoiles' => 2,
                    '1 étoile'  => 1,
                ],
                'choice_attr' => static fn ($choice, $key, $value): array => [
                    'class' => 'admin-rating__input',
                    'data-rating' => (string) $value,
                ],
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

    // L'image principale doit faire partie des images envoyées (page "ajouter" uniquement)
    public static function validateMainImage($data, ExecutionContextInterface $context): void
    {
        $images = is_array($data) ? ($data['images'] ?? []) : [];

        // Si des images existantes sont fournies (page "modifier"), la
        // validation stricte est gérée par le contrôleur — on ne vérifie ici
        // que la page "ajouter" où existingImages est vide.
        $hasExisting = is_array($data)
            && isset($data['existingImages'])
            && trim((string) $data['existingImages']) !== '';

        if ($hasExisting) {
            return;
        }

        if (count($images) === 0) {
            // Déjà signalé par "Ajoutez au moins 2 images" côté admin
            return;
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