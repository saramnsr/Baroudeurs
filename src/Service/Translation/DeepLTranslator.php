<?php

namespace App\Service\Translation;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Traduction via l'API DeepL.
 * Clé "…:fx" = compte gratuit (api-free.deepl.com), sinon compte payant (api.deepl.com).
 */
final class DeepLTranslator implements ContentTranslatorInterface
{
    // Codes de langue DeepL
    private const TARGETS = [
        'en' => 'EN-GB',
        'ar' => 'AR',
        'it' => 'IT',
    ];

    private HttpClientInterface $client;
    private string $apiKey;

    public function __construct(HttpClientInterface $client, string $deeplApiKey)
    {
        $this->client = $client;
        $this->apiKey = $deeplApiKey;
    }

    public function translate(array $texts, string $lang): array
    {
        if (!isset(self::TARGETS[$lang])) {
            throw new \InvalidArgumentException(sprintf('Langue non supportée : %s', $lang));
        }

        if ($this->apiKey === '') {
            throw new \RuntimeException('DEEPL_API_KEY manquante dans .env.local.');
        }

        // On n'envoie que les textes non vides (DeepL facture chaque caractère)
        $toTranslate = array_filter($texts, static fn ($t): bool => is_string($t) && trim($t) !== '');
        if ($toTranslate === []) {
            return $texts;
        }

        $response = $this->client->request('POST', $this->endpoint(), [
            'headers' => ['Authorization' => 'DeepL-Auth-Key ' . $this->apiKey],
            'json' => [
                'text' => array_values($toTranslate),
                'source_lang' => 'FR',
                'target_lang' => self::TARGETS[$lang],
            ],
            'timeout' => 15,
        ]);

        // toArray() lève une exception si DeepL répond par une erreur (clé invalide, quota…)
        $translations = $response->toArray()['translations'] ?? [];
        if (count($translations) !== count($toTranslate)) {
            throw new \RuntimeException('DeepL : réponse incomplète.');
        }

        // Remet chaque traduction à sa place d'origine
        $result = $texts;
        foreach (array_keys($toTranslate) as $i => $key) {
            $result[$key] = (string) $translations[$i]['text'];
        }

        return $result;
    }

    private function endpoint(): string
    {
        return str_ends_with($this->apiKey, ':fx')
            ? 'https://api-free.deepl.com/v2/translate'
            : 'https://api.deepl.com/v2/translate';
    }
}