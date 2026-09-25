<?php

namespace App\Command\Admin;

use App\Service\CloudinaryUploader;
use App\Service\Translation\ContentTranslatorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Vérifie que la traduction (DeepL) et Cloudinary fonctionnent.
 */
final class CheckServicesCommand extends Command
{
    protected static $defaultName = 'app:check-services';

    private CloudinaryUploader $uploader;
    private ContentTranslatorInterface $translator;
    private string $projectDir;

    public function __construct(CloudinaryUploader $uploader, ContentTranslatorInterface $translator, string $projectDir)
    {
        parent::__construct();
        $this->uploader = $uploader;
        $this->translator = $translator;
        $this->projectDir = $projectDir;
    }

    protected function configure(): void
    {
        $this->setDescription('Vérifie la traduction (DeepL) et l\'envoi d\'images (Cloudinary).');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $ok = true;

        // ===== Traduction =====
        $io->section('Traduction (DeepL)');
        try {
            $text = ['Bienvenue dans le désert du Sahara.'];
            foreach (['en' => 'Anglais', 'ar' => 'Arabe', 'it' => 'Italien'] as $lang => $label) {
                $io->writeln(sprintf('%s : %s', $label, $this->translator->translate($text, $lang)[0]));
            }
            $io->success('Traduction OK');
        } catch (\Throwable $e) {
            $ok = false;
            $io->error('Traduction : ' . $e->getMessage());
        }

        // ===== Cloudinary : envoi puis suppression d'une image de test =====
        $io->section('Cloudinary');
        try {
            $file = $this->projectDir . '/public/assets/images/logo/logo-sidebar.png';
            $image = $this->uploader->upload($file, 'tests');
            $io->writeln('Image envoyée (WebP) : ' . $image['url']);

            $this->uploader->delete($image['publicId']);
            $io->writeln('Image de test supprimée.');
            $io->success('Cloudinary OK');
        } catch (\Throwable $e) {
            $ok = false;
            $io->error('Cloudinary : ' . $e->getMessage());
        }

        return $ok ? 0 : 1;
    }
}