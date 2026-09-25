<?php

namespace App\Service;

use App\Entity\Circuit;

/**
 * Convertit un Circuit (base de données) au format utilisé par les templates du site :
 * mêmes clés que les anciens tableaux Twig (title.fr, gallery, review…).
 * Si une traduction manque, le français est affiché à la place.
 */
final class CircuitNormalizer
{
    private const LANGS = ['fr', 'en', 'ar', 'it'];

    public function normalize(Circuit $c): array
    {
        return [
            'id' => $c->getId(),
            'image' => $c->getImage(),
            'title' => $this->translated($c, 'Title'),
            'description' => $this->translated($c, 'Description'),
            'duration' => $this->translated($c, 'Duration'),
            'icons' => $c->getIcons(),
            'intro' => $this->translated($c, 'Intro'),
            'fullDescription' => $this->translated($c, 'FullDescription'),
            'itinerarySummary' => $this->translated($c, 'ItinerarySummary'),
            'itinerary' => $this->translated($c, 'Itinerary'),
            'itineraryDetail' => $this->translated($c, 'ItineraryDetail'),
            'included' => $this->translated($c, 'Included'),
            'includedIcons' => $c->getIncludedIcons(),
            'excluded' => $this->translated($c, 'Excluded'),
            'excludedIcons' => $c->getExcludedIcons(),
            'gallery' => $c->getGalleryImages(),
            'review' => [
                'avatar' => $c->getReviewAvatar(),
                'name' => $c->getReviewName(),
                'country' => $c->getReviewCountry(),
                'rating' => $c->getReviewRating(),
                'comment' => $this->translated($c, 'ReviewComment'),
            ],
        ];
    }

    /**
     * @param Circuit[] $circuits
     */
    public function normalizeAll(array $circuits): array
    {
        return array_map([$this, 'normalize'], $circuits);
    }

    /**
     * Valeurs d'un champ traduit : ['fr' => …, 'en' => …, 'ar' => …, 'it' => …].
     * Valeur vide dans une langue = valeur française.
     */
    private function translated(Circuit $c, string $field): array
    {
        $values = [];
        foreach (self::LANGS as $lang) {
            $values[$lang] = $c->{'get' . $field . ucfirst($lang)}();
        }

        foreach (self::LANGS as $lang) {
            if ($values[$lang] === null || $values[$lang] === '' || $values[$lang] === []) {
                $values[$lang] = $values['fr'];
            }
        }

        return $values;
    }
}