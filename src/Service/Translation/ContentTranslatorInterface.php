<?php

namespace App\Service\Translation;

/**
 * Traduction de textes français vers une autre langue.
 * Pour changer de fournisseur (DeepL, Azure…), il suffit de changer
 * l'implémentation dans config/services.yaml.
 */
interface ContentTranslatorInterface
{
    /**
     * @param string[] $texts Textes en français
     * @param string   $lang  Langue cible : "en", "ar" ou "it"
     *
     * @return string[] Textes traduits, dans le même ordre (et mêmes clés)
     */
    public function translate(array $texts, string $lang): array;
}