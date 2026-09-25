<?php

namespace App\Service;

use Cloudinary\Cloudinary;

/**
 * Envoi et suppression d'images sur Cloudinary.
 * Chaque image est convertie en WebP, limitée à 1920 px et compressée automatiquement.
 */
final class CloudinaryUploader
{
    private const ROOT_FOLDER = 'baroudeurs';

    private Cloudinary $cloudinary;

    public function __construct(string $cloudinaryUrl)
    {
        $this->cloudinary = new Cloudinary($cloudinaryUrl);
    }

    /**
     * Envoie une image et retourne ['url' => …, 'publicId' => …].
     *
     * @param string $filePath Chemin du fichier sur le serveur (ex : image envoyée par le formulaire)
     * @param string $folder   Sous-dossier Cloudinary (ex : "circuits")
     */
    public function upload(string $filePath, string $folder): array
    {
        $result = $this->cloudinary->uploadApi()->upload($filePath, [
            'folder' => self::ROOT_FOLDER . '/' . trim($folder, '/'),
            'resource_type' => 'image',
            'format' => 'webp',
            'unique_filename' => true,
            'overwrite' => false,
            // Redimensionne (sans agrandir) et compresse avant stockage
            'transformation' => [
                ['width' => 1920, 'height' => 1920, 'crop' => 'limit', 'quality' => 'auto:good'],
            ],
        ]);

        if (empty($result['secure_url']) || empty($result['public_id'])) {
            throw new \RuntimeException('Cloudinary : réponse invalide.');
        }

        return [
            'url' => (string) $result['secure_url'],
            'publicId' => (string) $result['public_id'],
        ];
    }

    /**
     * Supprime une image (ex : suppression définitive depuis la corbeille).
     */
    public function delete(string $publicId): void
    {
        $this->cloudinary->uploadApi()->destroy($publicId, [
            'resource_type' => 'image',
            'invalidate' => true,
        ]);
    }
}