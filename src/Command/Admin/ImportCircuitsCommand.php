<?php

namespace App\Command\Admin;

use App\Entity\Circuit;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Twig\Environment;

/**
 * Import unique : copie les circuits des templates Twig vers la base.
 * - Données complètes : templates/font/detail.html.twig (circuitData)
 * - Durées + ordre    : templates/font/circuits.html.twig (circuits)
 * Les ids 1 à 7 sont conservés : les liens du site ne changent pas.
 */
final class ImportCircuitsCommand extends Command
{
    protected static $defaultName = 'app:import-circuits';

    private const LANGS = ['fr', 'en', 'ar', 'it'];

    private EntityManagerInterface $em;
    private Environment $twig;
    private string $projectDir;

    public function __construct(EntityManagerInterface $em, Environment $twig, string $projectDir)
    {
        parent::__construct();
        $this->em = $em;
        $this->twig = $twig;
        $this->projectDir = $projectDir;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Importe les circuits des templates Twig vers la base (remplace les circuits existants).')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Affiche ce qui serait importé, sans rien modifier');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Import des circuits');

        // 1. Lecture des données dans les templates
        $details = $this->extractTwigArray('templates/font/detail.html.twig', '{% set circuitData', '{% set excursionData', 'circuitData');
        $list = $this->extractTwigArray('templates/font/circuits.html.twig', '{% set circuits', '<!--====== Start Page Banner', 'circuits');

        // Durée et position (ordre d'affichage) par id
        $durations = [];
        $positions = [];
        foreach ($list as $index => $row) {
            $durations[$row['id']] = $row['duration'] ?? [];
            $positions[$row['id']] = $index + 1;
        }

        // 2. Aperçu
        $rows = [];
        foreach ($details as $item) {
            $rows[] = [
                $item['id'],
                $item['title']['fr'] ?? '—',
                $durations[$item['id']]['fr'] ?? '—',
                count($item['itinerary']['fr'] ?? []) . ' jours',
                count($item['gallery'] ?? []) . ' images',
            ];
        }
        $io->table(['Id', 'Titre (FR)', 'Durée', 'Itinéraire', 'Galerie'], $rows);

        $current = (int) $this->em->getConnection()->fetchOne('SELECT COUNT(*) FROM circuit');

        if ($input->getOption('dry-run')) {
            $io->note(sprintf('Simulation : %d circuit(s) actuel(s) seraient remplacés par %d.', $current, count($details)));

            return 0;
        }

        if (!$io->confirm(sprintf('Remplacer les %d circuit(s) actuel(s) par ces %d circuits ?', $current, count($details)), false)) {
            $io->note('Import annulé.');

            return 0;
        }

        // 3. Import dans une transaction (tout ou rien)
        $conn = $this->em->getConnection();
        $conn->beginTransaction();

        try {
            $conn->executeStatement('DELETE FROM circuit');

            // Autorise la saisie manuelle des ids (1 à 7)
            $metadata = $this->em->getClassMetadata(Circuit::class);
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
            $idProperty = new \ReflectionProperty(Circuit::class, 'id');
            $idProperty->setAccessible(true);

            foreach ($details as $item) {
                $id = (int) $item['id'];
                $circuit = $this->buildCircuit($item, $durations[$id] ?? [], $positions[$id] ?? $id);
                $idProperty->setValue($circuit, $id);
                $this->em->persist($circuit);
            }

            $this->em->flush();

            // Le prochain circuit ajouté par l'admin prendra l'id suivant (8)
            $conn->fetchOne("SELECT setval('circuit_id_seq', (SELECT MAX(id) FROM circuit))");

            $conn->commit();
        } catch (\Throwable $e) {
            $conn->rollBack();
            $io->error('Import annulé, aucune modification : ' . $e->getMessage());

            return 1;
        }

        $io->success(sprintf('%d circuits importés.', count($details)));

        return 0;
    }

    /**
     * Extrait un tableau Twig ({% set x = [...] %}) d'un template et le convertit en tableau PHP.
     */
    private function extractTwigArray(string $file, string $startMarker, string $endMarker, string $variable): array
    {
        $source = file_get_contents($this->projectDir . '/' . $file);
        if ($source === false) {
            throw new \RuntimeException(sprintf('Fichier introuvable : %s', $file));
        }

        $start = strpos($source, $startMarker);
        $end = $start === false ? false : strpos($source, $endMarker, $start);
        if ($start === false || $end === false) {
            throw new \RuntimeException(sprintf('Bloc "%s" introuvable dans %s', $variable, $file));
        }

        $block = substr($source, $start, $end - $start);
        $json = $this->twig->createTemplate($block . '{{ ' . $variable . '|json_encode|raw }}')->render([]);

        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Construit un Circuit à partir d'un élément de circuitData.
     */
    private function buildCircuit(array $item, array $duration, int $position): Circuit
    {
        $text = static fn ($v): ?string => ($v === null || $v === '') ? null : (string) $v;
        $list = static fn ($v): array => is_array($v) ? array_values($v) : [];

        if (empty($item['title']['fr'])) {
            throw new \RuntimeException(sprintf('Circuit %s : titre FR manquant.', $item['id'] ?? '?'));
        }

        $c = new Circuit();
        $c->setImage((string) $item['image']);
        $c->setPosition($position);
        $c->setIcons($list($item['icons'] ?? []));
        $c->setIncludedIcons($list($item['includedIcons'] ?? []));
        $c->setExcludedIcons($list($item['excludedIcons'] ?? []));

        // Galerie : [{url, title}]
        $c->setGalleryImages(array_map(static fn (array $g): array => [
            'url' => (string) $g['url'],
            'title' => (string) ($g['title'] ?? ''),
        ], $item['gallery'] ?? []));

        // Avis
        $review = $item['review'] ?? [];
        $c->setReviewAvatar($text($review['avatar'] ?? null));
        $c->setReviewName($text($review['name'] ?? null));
        $c->setReviewCountry($text($review['country'] ?? null));
        $c->setReviewRating(isset($review['rating']) ? (int) $review['rating'] : null);

        // Champs traduits (Fr, En, Ar, It)
        foreach (self::LANGS as $lang) {
            $L = ucfirst($lang);

            $c->{'setTitle' . $L}((string) ($item['title'][$lang] ?? ''));
            $c->{'setDescription' . $L}((string) ($item['description'][$lang] ?? ''));
            $c->{'setDuration' . $L}($text($duration[$lang] ?? null));
            $c->{'setIntro' . $L}($text($item['intro'][$lang] ?? null));
            $c->{'setFullDescription' . $L}($text($item['fullDescription'][$lang] ?? null));
            $c->{'setItinerarySummary' . $L}($text($item['itinerarySummary'][$lang] ?? null));
            $c->{'setItinerary' . $L}($list($item['itinerary'][$lang] ?? []));
            $c->{'setItineraryDetail' . $L}($list($item['itineraryDetail'][$lang] ?? []));
            $c->{'setIncluded' . $L}($list($item['included'][$lang] ?? []));
            $c->{'setExcluded' . $L}($list($item['excluded'][$lang] ?? []));
            $c->{'setReviewComment' . $L}($text($review['comment'][$lang] ?? null));
        }

        return $c;
    }
}