<?php

namespace App\Command;

use App\Repository\ProgrammeRepository;
use Cloudinary\Api\Upload\UploadApi;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CloudinaryMigrateCommand extends Command
{
    protected static $defaultName = 'app:cloudinary-migrate';
    protected static $defaultDescription = 'Uploads Programme images (image + images fields) to Cloudinary and replaces local paths with Cloudinary URLs.';

    private ProgrammeRepository $programmeRepository;
    private EntityManagerInterface $em;
    private string $localImagesBase;

    public function __construct(
        ProgrammeRepository $programmeRepository,
        EntityManagerInterface $em,
        string $projectDir
    ) {
        parent::__construct();
        $this->programmeRepository = $programmeRepository;
        $this->em = $em;
        $this->localImagesBase = rtrim($projectDir, '/') . '/public/assets/images/service/';
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Show what would be uploaded without actually uploading or saving to DB');
    }

protected function execute(InputInterface $input, OutputInterface $output): int
{
    ini_set('memory_limit', '1024M');

        $io = new SymfonyStyle($input, $output);
        $dryRun = $input->getOption('dry-run');

        if (empty($_ENV['CLOUDINARY_URL']) && empty(getenv('CLOUDINARY_URL'))) {
            $io->error('CLOUDINARY_URL is not set. Check your .env file.');
            return 1;
        }

        $cloudinaryUrl = $_ENV['CLOUDINARY_URL'] ?? getenv('CLOUDINARY_URL');
        \Cloudinary\Configuration\Configuration::instance($cloudinaryUrl);

        $programmes = $this->programmeRepository->findAll();
        $io->title(sprintf('Migrating images for %d programme(s)%s', count($programmes), $dryRun ? ' (DRY RUN)' : ''));

        $uploadApi = new UploadApi();
        $uploaded = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($programmes as $programme) {
            $io->section(sprintf('Programme #%d — %s', $programme->getId(), $programme->getTitleFr()));

            $coverPath = $programme->getImage();
            if ($coverPath) {
                $newUrl = $this->uploadIfLocal($uploadApi, $coverPath, $io, $dryRun, $uploaded, $skipped, $failed);
                if ($newUrl !== null && !$dryRun) {
                    $programme->setImage($newUrl);
                }
            }

            $galleryImages = $programme->getImages() ?? [];
            $newGallery = [];
            foreach ($galleryImages as $imgPath) {
                $newUrl = $this->uploadIfLocal($uploadApi, $imgPath, $io, $dryRun, $uploaded, $skipped, $failed);
                $newGallery[] = $newUrl ?? $imgPath;
            }
            if (!$dryRun) {
                $programme->setImages($newGallery);
            }
        }

        if (!$dryRun) {
            $this->em->flush();
            $io->success('Database updated with new Cloudinary URLs.');
        } else {
            $io->note('Dry run — nothing was uploaded or saved.');
        }

        $io->table(
            ['Uploaded', 'Skipped (already a URL)', 'Failed'],
            [[$uploaded, $skipped, $failed]]
        );

        return 0;
    }

    private function uploadIfLocal(
        UploadApi $uploadApi,
        string $path,
        SymfonyStyle $io,
        bool $dryRun,
        int &$uploaded,
        int &$skipped,
        int &$failed
    ): ?string {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            $io->writeln(sprintf('  <comment>SKIP</comment> %s (already a URL)', $path));
            $skipped++;
            return null;
        }

        $fullLocalPath = $this->localImagesBase . $path;

        if (!file_exists($fullLocalPath)) {
            $io->writeln(sprintf('  <error>MISSING</error> %s (file not found at %s)', $path, $fullLocalPath));
            $failed++;
            return null;
        }

        if ($dryRun) {
            $io->writeln(sprintf('  <info>WOULD UPLOAD</info> %s', $path));
            $uploaded++;
            return null;
        }

        $uploadPath = $fullLocalPath;
        $tempPath = $this->resizeIfTooLarge($fullLocalPath, $io);
        if ($tempPath !== null) {
            $uploadPath = $tempPath;
        }

        try {
            $dir = pathinfo($path, PATHINFO_DIRNAME);
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $publicId = ($dir === '.' || $dir === '')
                ? 'baroudeurs/service/' . $filename
                : 'baroudeurs/service/' . $dir . '/' . $filename;
            $publicId = str_replace('\\', '/', $publicId);
            $publicId = preg_replace('#/+#', '/', $publicId);

            $result = $uploadApi->upload($uploadPath, [
                'public_id' => $publicId,
                'overwrite' => true,
                'resource_type' => 'image',
            ]);

            if ($tempPath !== null) {
                @unlink($tempPath);
            }

            $secureUrl = $result['secure_url'] ?? null;

            if ($secureUrl) {
                $io->writeln(sprintf('  <info>OK</info> %s -> %s', $path, $secureUrl));
                $uploaded++;
                return $secureUrl;
            }

            $io->writeln(sprintf('  <error>FAILED</error> %s (no secure_url in response)', $path));
            $failed++;
            return null;
        } catch (\Throwable $e) {
            if ($tempPath !== null) {
                @unlink($tempPath);
            }
            $io->writeln(sprintf('  <error>FAILED</error> %s (%s)', $path, $e->getMessage()));
            $failed++;
            return null;
        }
    }

    private function resizeIfTooLarge(string $fullLocalPath, SymfonyStyle $io): ?string
    {
        $maxBytes = 10 * 1024 * 1024;
        $originalSize = filesize($fullLocalPath);

        if ($originalSize === false || $originalSize <= $maxBytes) {
            return null;
        }

        $ext = strtolower(pathinfo($fullLocalPath, PATHINFO_EXTENSION));
        $image = null;

        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                $image = @imagecreatefromjpeg($fullLocalPath);
                break;
            case 'png':
                $image = @imagecreatefrompng($fullLocalPath);
                break;
            case 'webp':
                if (function_exists('imagecreatefromwebp')) {
                    $image = @imagecreatefromwebp($fullLocalPath);
                }
                break;
        }

        if (!$image) {
            $io->writeln(sprintf(
                '  <comment>WARN</comment> %s is %d bytes (over limit) but could not be resized locally (format/GD issue) — upload will likely fail.',
                basename($fullLocalPath),
                $originalSize
            ));
            return null;
        }

        $width = imagesx($image);
        $height = imagesy($image);
        $maxDimension = 2000;
        $scale = min(1, $maxDimension / max($width, $height));

        if ($scale < 1) {
            $newWidth = max(1, (int) round($width * $scale));
            $newHeight = max(1, (int) round($height * $scale));
            $resized = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $resized;
        }

        $tempPath = sys_get_temp_dir() . '/' . uniqid('cloudinary_resize_', true) . '.jpg';
        imagejpeg($image, $tempPath, 82);
        imagedestroy($image);

        $newSize = filesize($tempPath) ?: 0;
        $io->writeln(sprintf(
            '  <comment>RESIZED</comment> %s: %d bytes -> %d bytes',
            basename($fullLocalPath),
            $originalSize,
            $newSize
        ));

        return $tempPath;
    }
}