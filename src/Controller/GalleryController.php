<?php

namespace App\Controller;

use Cloudinary\Api\Admin\AdminApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    #[Route('/gallery', name: 'app_font_gallery')]
    public function index(): Response
    {
        // Map Cloudinary folder names to their filter categories and translation keys
        $folderMap = [
            'Sahara Desert'         => ['class' => 'cat-desert',  'caption' => 'gallery.caption.desert',  'filter' => 'gallery.filter.desert'],
            'Douz'                  => ['class' => 'cat-douz',    'caption' => 'gallery.caption.douz',    'filter' => 'gallery.filter.douz'],
            'Island of Djerba'      => ['class' => 'cat-djerba',  'caption' => 'gallery.caption.djerba',  'filter' => 'gallery.filter.djerba'],
            'Desert Oasis'          => ['class' => 'cat-oasis',   'caption' => 'gallery.caption.oasis',   'filter' => 'gallery.filter.oasis'],
            'Bedouin Bivouac Camp'  => ['class' => 'cat-bivouac', 'caption' => 'gallery.caption.bivouac', 'filter' => 'gallery.filter.bivouac'],
            'star wars'             => ['class' => 'cat-meeting', 'caption' => 'gallery.caption.meeting', 'filter' => 'gallery.filter.meeting'],
        ];

        $galleryItems = [];

        try {
            $adminApi = new AdminApi([
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'] ?? 'dy13axswo',
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'] ?? '',
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'] ?? '',
            ]);

            foreach ($folderMap as $folderName => $meta) {
                // Cloudinary folder path: baroudeurs/gallery/Folder Name
                $prefix = 'baroudeurs/gallery/' . $folderName . '/';

                try {
                    $result = $adminApi->assets([
                        'type'    => 'upload',
                        'prefix'  => $prefix,
                        'max_results' => 100,
                    ]);

                    foreach ($result['resources'] as $asset) {
                        $galleryItems[] = [
                            'url'     => $asset['secure_url'],
                            'class'   => $meta['class'],
                            'caption' => $meta['caption'],
                            'filter'  => $meta['filter'],
                        ];
                    }
                } catch (\Exception $e) {
                    // Skip folder if it doesn't exist
                    continue;
                }
            }
        } catch (\Exception $e) {
            // If Cloudinary fails, show empty gallery
            $galleryItems = [];
        }

        return $this->render('font/gallery.html.twig', [
            'galleryItems' => $galleryItems,
        ]);
    }
}