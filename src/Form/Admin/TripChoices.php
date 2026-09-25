<?php

namespace App\Form\Admin;

/**
 * Listes utilisées par le formulaire circuit / excursion.
 * Reprises des données actuelles du site.
 */
final class TripChoices
{
    // Icônes des cartes (page liste) : toujours les mêmes, ajoutées à l'enregistrement
    public const DEFAULT_CARD_ICONS = [
        'fas fa-campground',
        'fas fa-fire',
        'fas fa-moon',
        'fas fa-utensils',
    ];

    // "Inclus" existants : texte FR => icône flaticon (sans préfixe)
    public const INCLUDED = [
        'Pension complète tout au long du séjour' => 'eat',
        'Pension complète (petits déjeuners, déjeuners, dîners)' => 'eat',
        'Alimentation' => 'eat',
        'Déjeuner' => 'eat',
        'Déjeuner berbère' => 'eat',
        'Repas typiques préparés par les bédouins' => 'eat',
        'Dîners traditionnels préparés par des bédouins (chorba, couscous, etc.)' => 'campfire',
        'Hébergement en bivouac sous tente bédouine' => 'tent-1',
        'Hébergement en hôtels 3* tout au long du parcours' => 'cottage',
        "Hébergement à l'hôtel à Djerba et à Douz" => 'cottage',
        'Hébergement à Ksar Ghilane' => 'tent-1',
        'Matelas ou sac de couchage' => 'bed',
        'Couverture' => 'blanket',
        'Tente' => 'tent-1',
        "Transfert de l'aéroport à l'hôtel et de retour" => 'van',
        "Prise en charge à l'hôtel" => 'van',
        'Transports et assistance tout au long du séjour' => 'van',
        'Transports en véhicules confortables' => 'van',
        'Transport en véhicule climatisé' => 'van',
        'Visites guidées des principaux sites touristiques' => 'hiking',
        'Guide local' => 'hiking',
        'Autorisation' => 'draw-check-mark',
    ];

    // "Non inclus" existants : texte FR => icône flaticon (sans préfixe)
    public const EXCLUDED = [
        'Pourboires' => 'draw-check-mark',
        'Boissons aux repas' => 'pot',
        'Boissons dans les hôtels et restaurants' => 'pot',
    ];
}