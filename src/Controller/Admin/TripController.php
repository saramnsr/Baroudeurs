<?php

namespace App\Controller\Admin;

use App\Entity\Circuit;
use App\Entity\Excursion;
use App\Form\Admin\TripChoices;
use App\Form\Admin\TripType;
use App\Repository\CircuitRepository;
use App\Repository\ExcursionRepository;
use App\Service\CloudinaryUploader;
use App\Service\Translation\ContentTranslatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Pages circuits / excursions : ajouter, gérer (liste), modifier, corbeille.
 * {type} = "circuits" ou "excursions".
 *
 * @Route("/admin/{type}", name="admin_trip_", requirements={"type"="circuits|excursions"})
 * @IsGranted("ROLE_ADMIN")
 */
class TripController extends AbstractController
{
    private const LABELS = [
        'circuits' => [
            'singular' => 'circuit',
            'plural' => 'circuits',
            'add_title' => 'Ajouter un circuit',
            'manage_title' => 'Modifier un circuit',
            'trash_title' => 'Corbeille — Circuits',
        ],
        'excursions' => [
            'singular' => 'excursion',
            'plural' => 'excursions',
            'add_title' => 'Ajouter une excursion',
            'manage_title' => 'Modifier une excursion',
            'trash_title' => 'Corbeille — Excursions',
        ],
    ];

    private const TRANSLATION_LANGS = ['en', 'ar', 'it'];

    public function __construct(
        private EntityManagerInterface $em,
        private CloudinaryUploader $uploader,
        private ContentTranslatorInterface $translator,
        private CircuitRepository $circuitRepository,
        private ExcursionRepository $excursionRepository,
    ) {}

    // ==================================================================
    // LISTE — "Modifier un circuit / une excursion"
    // ==================================================================

    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(string $type): Response
    {
        return $this->render('admin/trip/list.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'items' => $this->loadItems($type),
            'trashCount' => count($this->loadTrashedItems($type)),
        ]);
    }

    // ==================================================================
    // CORBEILLE
    // ==================================================================

    /**
     * @Route("/corbeille", name="trash", methods={"GET"})
     */
    public function trash(string $type): Response
    {
        return $this->render('admin/trip/trash.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'items' => $this->loadTrashedItems($type),
        ]);
    }

    // ==================================================================
    // MODIFIER
    // ==================================================================

    /**
     * @Route("/{id}/modifier", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, string $type, int $id): Response
    {
        set_time_limit(180);
        ini_set('memory_limit', '512M');

        $item = $this->requireItem($type, $id);
        $isExcursion = $type === 'excursions';

        $formData = $isExcursion
            ? $this->excursionToFormData($item)
            : $this->circuitToFormData($item);

        $form = $this->createForm(TripType::class, $formData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if ($isExcursion) {
                    $this->updateExcursion($item, $form->getData());
                } else {
                    $this->updateCircuit($item, $form->getData());
                }

                $this->em->flush();

                $this->addFlash('success', sprintf(
                    'Le %s « %s » a été mis à jour.',
                    self::LABELS[$type]['singular'],
                    $item->getTitleFr()
                ));

                return $this->redirectToRoute('admin_trip_index', ['type' => $type]);
            } catch (\Throwable $e) {
                $this->addFlash('error', "Erreur lors de la mise à jour : " . $e->getMessage());
            }
        }

        $existingImages = $item->getGalleryImages();

        return $this->render('admin/trip/edit.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'form' => $form->createView(),
            'existingImages' => $existingImages,
            'mainExistingIndex' => $this->findMainExistingIndex($item, $existingImages),
            'currentAvatarUrl' => $item->getReviewAvatar(),
        ]);
    }

    // ==================================================================
    // MAPPERS : entité → données de formulaire
    // ==================================================================

    private function circuitToFormData(Circuit $c): array
    {
        return $this->entityToFormData(
            $c,
            $c->getTitleFr(),
            $c->getDurationFr(),
            $c->getDescriptionFr(),
            $c->getFullDescriptionFr(),
            $c->getItinerarySummaryFr(),
            $c->getItineraryFr(),
            $c->getItineraryDetailFr(),
            $c->getIncludedFr(),
            $c->getExcludedFr(),
            $c->getReviewName(),
            $c->getReviewCountry(),
            $c->getReviewRating(),
            $c->getReviewCommentFr()
        );
    }

    private function excursionToFormData(Excursion $e): array
    {
        return $this->entityToFormData(
            $e,
            $e->getTitleFr(),
            $e->getDurationFr(),
            $e->getDescriptionFr(),
            $e->getFullDescriptionFr(),
            $e->getItinerarySummaryFr(),
            $e->getItineraryFr(),
            $e->getItineraryDetailFr(),
            $e->getIncludedFr(),
            $e->getExcludedFr(),
            $e->getReviewName(),
            $e->getReviewCountry(),
            $e->getReviewRating(),
            $e->getReviewCommentFr()
        );
    }

    /**
     * Factorisation du mapping entité → données de formulaire.
     * Fonctionne pour Circuit et Excursion (mêmes noms de méthodes FR).
     */
    private function entityToFormData(
        object $entity,
        ?string $titleFr,
        ?string $durationFr,
        ?string $descriptionFr,
        ?string $fullDescriptionFr,
        ?string $itinerarySummaryFr,
        array $itineraryFr,
        array $itineraryDetailFr,
        array $includedFr,
        array $excludedFr,
        ?string $reviewName,
        ?string $reviewCountry,
        ?int $reviewRating,
        ?string $reviewCommentFr,
    ): array {
        $itinerary = [];
        $titles = $itineraryFr;
        $details = $itineraryDetailFr;
        $max = max(count($titles), count($details));
        for ($i = 0; $i < $max; $i++) {
            $itinerary[] = [
                'title' => $titles[$i] ?? null,
                'detail' => $details[$i] ?? null,
            ];
        }
        if (empty($itinerary)) {
            $itinerary = [['title' => null, 'detail' => null]];
        }

        [$includedItems, $includedCustom] = $this->splitTags($includedFr, TripChoices::INCLUDED);
        [$excludedItems, $excludedCustom] = $this->splitTags($excludedFr, TripChoices::EXCLUDED);

        return [
            'title' => $titleFr,
            'duration' => $durationFr,
            'description' => $descriptionFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itinerary,
            'includedItems' => $includedItems,
            'includedCustom' => $includedCustom,
            'excludedItems' => $excludedItems,
            'excludedCustom' => $excludedCustom,
            'reviewName' => $reviewName,
            'reviewCountry' => $reviewCountry,
            'reviewRating' => $reviewRating,
            'reviewComment' => $reviewCommentFr,
            'mainImageIndex' => 0,
            'mainImageKey' => '',
            'existingImages' => '',
        ];
    }

    private function splitTags(array $tags, array $catalog): array
    {
        $fromCatalog = [];
        $custom = [];
        foreach ($tags as $tag) {
            if (isset($catalog[$tag])) {
                $fromCatalog[] = $tag;
            } else {
                $custom[] = $tag;
            }
        }
        return [$fromCatalog, $custom];
    }

    private function findMainExistingIndex(object $entity, array $gallery): int
    {
        $mainUrl = $entity->getImage();
        foreach ($gallery as $i => $img) {
            if (($img['url'] ?? null) === $mainUrl) {
                return $i;
            }
        }
        return -1;
    }

    // ==================================================================
    // SUPPRIMER / RESTAURER / PURGER
    // ==================================================================

    /**
     * @Route("/{id}/supprimer", name="delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, string $type, int $id): Response
    {
        $item = $this->requireItem($type, $id);

        if (!$this->isCsrfTokenValid('admin_trip_delete_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_trip_index', ['type' => $type]);
        }

        $title = $item->getTitleFr();
        $item->moveToTrash();
        $this->em->flush();

        $this->addFlash('success', sprintf(
            'Le %s « %s » a été déplacé dans la corbeille.',
            self::LABELS[$type]['singular'],
            $title
        ));

        return $this->redirectToRoute('admin_trip_index', ['type' => $type]);
    }

    /**
     * @Route("/{id}/restaurer", name="restore", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function restore(Request $request, string $type, int $id): Response
    {
        $item = $this->requireItem($type, $id, allowTrashed: true);

        if (!$this->isCsrfTokenValid('admin_trip_restore_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_trip_trash', ['type' => $type]);
        }

        $title = $item->getTitleFr();
        $item->restore();
        $this->em->flush();

        $this->addFlash('success', sprintf(
            'Le %s « %s » a été restauré.',
            self::LABELS[$type]['singular'],
            $title
        ));

        return $this->redirectToRoute('admin_trip_trash', ['type' => $type]);
    }

    /**
     * @Route("/{id}/supprimer-definitivement", name="purge", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function purge(Request $request, string $type, int $id): Response
    {
        $item = $this->requireItem($type, $id, allowTrashed: true);

        if (!$this->isCsrfTokenValid('admin_trip_purge_' . $id, (string) $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton de sécurité invalide.');
            return $this->redirectToRoute('admin_trip_trash', ['type' => $type]);
        }

        $title = $item->getTitleFr();
        $this->deleteCloudinaryAssets($item);
        $this->em->remove($item);
        $this->em->flush();

        $this->addFlash('success', sprintf(
            'Le %s « %s » a été supprimé définitivement.',
            self::LABELS[$type]['singular'],
            $title
        ));

        return $this->redirectToRoute('admin_trip_trash', ['type' => $type]);
    }

    // ==================================================================
    // AJOUTER
    // ==================================================================

    /**
     * @Route("/ajouter", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, string $type): Response
    {
        set_time_limit(180);
        ini_set('memory_limit', '512M');

        $form = $this->createForm(TripType::class, [
            'mainImageIndex' => 0,
            'mainImageKey' => '',
            'existingImages' => '',
            'itinerary' => [['title' => null, 'detail' => null]],
            'includedItems' => [],
            'includedCustom' => [],
            'excludedItems' => [],
            'excludedCustom' => [],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $isExcursion = $type === 'excursions';

            try {
                $item = $isExcursion
                    ? $this->buildExcursion($data)
                    : $this->buildCircuit($data);

                $this->em->persist($item);
                $this->em->flush();

                $this->addFlash('success', sprintf(
                    'Le %s « %s » a bien été enregistré.',
                    self::LABELS[$type]['singular'],
                    $item->getTitleFr()
                ));

                return $this->redirectToRoute('app_font_detail', [
                    'type' => $isExcursion ? 'excursion' : 'circuit',
                    'id' => $item->getId(),
                ]);
            } catch (\Throwable $e) {
                $this->addFlash('error', "Erreur lors de l'enregistrement : " . $e->getMessage());
            }
        }

        return $this->render('admin/trip/add.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'form' => $form->createView(),
        ]);
    }

    // ==================================================================
    // CHARGEMENT
    // ==================================================================

    /**
     * @return Circuit[]|Excursion[]
     */
    private function loadItems(string $type): array
    {
        return $type === 'circuits'
            ? $this->circuitRepository->findPublished()
            : $this->excursionRepository->findPublished();
    }

    /**
     * @return Circuit[]|Excursion[]
     */
    private function loadTrashedItems(string $type): array
    {
        return $type === 'circuits'
            ? $this->circuitRepository->findTrashed()
            : $this->excursionRepository->findTrashed();
    }

    /**
     * @return Circuit|Excursion
     */
    private function requireItem(string $type, int $id, bool $allowTrashed = false): object
    {
        $repo = $type === 'circuits' ? $this->circuitRepository : $this->excursionRepository;
        $item = $repo->find($id);

        if ($item === null) {
            throw $this->createNotFoundException("Élément introuvable (id {$id}).");
        }

        if (!$allowTrashed && $item->isDeleted()) {
            throw $this->createNotFoundException("Cet élément est dans la corbeille.");
        }

        return $item;
    }

    // ==================================================================
    // CLOUDINARY
    // ==================================================================

    private function deleteCloudinaryAssets(object $entity): void
    {
        $publicIds = [];

        $mainPid = $this->publicIdFromUrl($entity->getImage());
        if ($mainPid !== null) {
            $publicIds[] = $mainPid;
        }

        foreach ($entity->getGalleryImages() as $img) {
            $url = $img['url'] ?? null;
            if (!is_string($url)) continue;
            $pid = $this->publicIdFromUrl($url);
            if ($pid !== null) {
                $publicIds[] = $pid;
            }
        }

        $avatarPid = $this->publicIdFromUrl($entity->getReviewAvatar());
        if ($avatarPid !== null) {
            $publicIds[] = $avatarPid;
        }

        foreach (array_unique($publicIds) as $pid) {
            try {
                $this->uploader->delete($pid);
            } catch (\Throwable $e) {
                // On continue : une image absente ne doit pas bloquer
            }
        }
    }

    private function publicIdFromUrl(?string $url): ?string
    {
        if ($url === null || $url === '' || !str_starts_with($url, 'http')) {
            return null;
        }
        if (!str_contains($url, 'res.cloudinary.com')) {
            return null;
        }

        $parts = explode('/upload/', $url, 2);
        if (count($parts) !== 2) {
            return null;
        }

        $path = preg_replace('#^v\d+/#', '', $parts[1]);
        $path = preg_replace('#\.[a-zA-Z0-9]+$#', '', $path);

        return $path !== '' ? $path : null;
    }

    // ==================================================================
    // CRÉATION : CIRCUIT
    // ==================================================================

    private function buildCircuit(array $data): Circuit
    {
        $c = new Circuit();
        $this->applyFormDataToCircuit($c, $data, 'circuits', true);
        return $c;
    }

    private function applyFormDataToCircuit(Circuit $c, array $data, string $folder, bool $isNew): void
    {
        // Images
        $this->applyImages($c, $data, $folder, $isNew);

        // Textes FR
        $titleFr = trim((string) ($data['title'] ?? ''));
        $durationFr = trim((string) ($data['duration'] ?? ''));
        $descriptionFr = trim((string) ($data['description'] ?? ''));
        $fullDescriptionFr = trim((string) ($data['fullDescription'] ?? ''));
        $itinerarySummaryFr = trim((string) ($data['itinerarySummary'] ?? ''));

        if ($titleFr === '') {
            throw new \RuntimeException('Le titre est obligatoire.');
        }

        $c->setTitleFr($titleFr);
        $c->setDurationFr($durationFr !== '' ? $durationFr : null);
        $c->setDescriptionFr($descriptionFr);
        $c->setFullDescriptionFr($fullDescriptionFr !== '' ? $fullDescriptionFr : null);
        $c->setItinerarySummaryFr($itinerarySummaryFr !== '' ? $itinerarySummaryFr : null);

        // Itinéraire
        [$itineraryFr, $itineraryDetailFr] = $this->extractItinerary($data);
        $c->setItineraryFr($itineraryFr);
        $c->setItineraryDetailFr($itineraryDetailFr);

        // Inclus / exclus
        $includedFr = $this->mergeTags($data['includedItems'] ?? [], $data['includedCustom'] ?? []);
        $excludedFr = $this->mergeTags($data['excludedItems'] ?? [], $data['excludedCustom'] ?? []);
        $c->setIncludedFr($includedFr);
        $c->setExcludedFr($excludedFr);
        $c->setIncludedIcons($this->iconsFor($includedFr, TripChoices::INCLUDED));
        $c->setExcludedIcons($this->iconsFor($excludedFr, TripChoices::EXCLUDED));
        $c->setIcons(TripChoices::DEFAULT_CARD_ICONS);

        // Avis
        $this->applyReview($c, $data, $folder);

        // Position (nouveau uniquement)
        if ($isNew) {
            $maxPos = (int) $this->em->getConnection()
                ->fetchOne('SELECT COALESCE(MAX(position), 0) FROM circuit');
            $c->setPosition($maxPos + 1);
        }

        // Traductions
        if ($isNew) {
            $this->applyTranslationsForCircuit($c, $data, $titleFr, $durationFr, $descriptionFr, $fullDescriptionFr, $itinerarySummaryFr, $itineraryFr, $itineraryDetailFr, $includedFr, $excludedFr);
        } else {
            $this->translateChangedFieldsForCircuit($c, $data, $titleFr, $durationFr, $descriptionFr, $fullDescriptionFr, $itinerarySummaryFr, $itineraryFr, $itineraryDetailFr, $includedFr, $excludedFr);
        }
    }

    // ==================================================================
    // CRÉATION : EXCURSION
    // ==================================================================

    private function buildExcursion(array $data): Excursion
    {
        $e = new Excursion();
        $this->applyFormDataToExcursion($e, $data, 'excursions', true);
        return $e;
    }

    private function applyFormDataToExcursion(Excursion $e, array $data, string $folder, bool $isNew): void
    {
        $this->applyImages($e, $data, $folder, $isNew);

        $titleFr = trim((string) ($data['title'] ?? ''));
        $durationFr = trim((string) ($data['duration'] ?? ''));
        $descriptionFr = trim((string) ($data['description'] ?? ''));
        $fullDescriptionFr = trim((string) ($data['fullDescription'] ?? ''));
        $itinerarySummaryFr = trim((string) ($data['itinerarySummary'] ?? ''));

        if ($titleFr === '') {
            throw new \RuntimeException('Le titre est obligatoire.');
        }

        $e->setTitleFr($titleFr);
        $e->setDurationFr($durationFr !== '' ? $durationFr : null);
        $e->setDescriptionFr($descriptionFr);
        $e->setFullDescriptionFr($fullDescriptionFr !== '' ? $fullDescriptionFr : null);
        $e->setItinerarySummaryFr($itinerarySummaryFr !== '' ? $itinerarySummaryFr : null);

        [$itineraryFr, $itineraryDetailFr] = $this->extractItinerary($data);
        $e->setItineraryFr($itineraryFr);
        $e->setItineraryDetailFr($itineraryDetailFr);

        $includedFr = $this->mergeTags($data['includedItems'] ?? [], $data['includedCustom'] ?? []);
        $excludedFr = $this->mergeTags($data['excludedItems'] ?? [], $data['excludedCustom'] ?? []);
        $e->setIncludedFr($includedFr);
        $e->setExcludedFr($excludedFr);
        $e->setIncludedIcons($this->iconsFor($includedFr, TripChoices::INCLUDED));
        $e->setExcludedIcons($this->iconsFor($excludedFr, TripChoices::EXCLUDED));
        $e->setIcons(TripChoices::DEFAULT_CARD_ICONS);

        $this->applyReview($e, $data, $folder);

        if ($isNew) {
            $maxPos = (int) $this->em->getConnection()
                ->fetchOne('SELECT COALESCE(MAX(position), 0) FROM excursion');
            $e->setPosition($maxPos + 1);
        }

        if ($isNew) {
            $this->applyTranslationsForExcursion($e, $data, $titleFr, $durationFr, $descriptionFr, $fullDescriptionFr, $itinerarySummaryFr, $itineraryFr, $itineraryDetailFr, $includedFr, $excludedFr);
        } else {
            $this->translateChangedFieldsForExcursion($e, $data, $titleFr, $durationFr, $descriptionFr, $fullDescriptionFr, $itinerarySummaryFr, $itineraryFr, $itineraryDetailFr, $includedFr, $excludedFr);
        }
    }

    // ==================================================================
    // MISE À JOUR
    // ==================================================================

    private function updateCircuit(Circuit $c, array $data): void
    {
        $this->applyFormDataToCircuit($c, $data, 'circuits', false);
    }

    private function updateExcursion(Excursion $e, array $data): void
    {
        $this->applyFormDataToExcursion($e, $data, 'excursions', false);
    }

    // ==================================================================
    // HELPERS PARTAGÉS
    // ==================================================================

    /**
     * Applique les images (existantes + nouvelles) sur l'entité.
     */
    private function applyImages(object $entity, array $data, string $folder, bool $isNew): void
    {
        if ($isNew) {
            // Création : les images viennent toutes du champ "images"
            /** @var UploadedFile[] $images */
            $images = $data['images'] ?? [];
            if (count($images) < 1) {
                throw new \RuntimeException('Ajoutez au moins une image.');
            }

            $mainIndex = (int) ($data['mainImageIndex'] ?? 0);
            if ($mainIndex < 0 || $mainIndex >= count($images)) {
                $mainIndex = 0;
            }

            $uploaded = [];
            foreach ($images as $file) {
                $r = $this->uploader->upload($file->getPathname(), $folder);
                $uploaded[] = ['url' => $r['url'], 'title' => ''];
            }

            $entity->setImage($uploaded[$mainIndex]['url']);
            $entity->setGalleryImages($uploaded);
            return;
        }

        // Édition : existantes (JSON) + nouvelles
        $existingJson = trim((string) ($data['existingImages'] ?? ''));
        $existing = [];
        if ($existingJson !== '') {
            $decoded = json_decode($existingJson, true);
            if (is_array($decoded)) {
                foreach ($decoded as $entry) {
                    $url = is_array($entry) ? ($entry['url'] ?? null) : null;
                    if (is_string($url) && $url !== '') {
                        $existing[] = ['url' => $url, 'title' => ''];
                    }
                }
            }
        }

        $newFiles = $data['images'] ?? [];
        $uploaded = [];
        foreach ($newFiles as $file) {
            $r = $this->uploader->upload($file->getPathname(), $folder);
            $uploaded[] = ['url' => $r['url'], 'title' => ''];
        }

        $gallery = array_merge($existing, $uploaded);
        if (count($gallery) === 0) {
            throw new \RuntimeException('Ajoutez au moins une image.');
        }

        $mainKey = trim((string) ($data['mainImageKey'] ?? ''));
        $mainUrl = null;
        if (preg_match('/^existing:(\d+)$/', $mainKey, $m)) {
            $i = (int) $m[1];
            $mainUrl = $existing[$i]['url'] ?? null;
        } elseif (preg_match('/^new:(\d+)$/', $mainKey, $m)) {
            $i = (int) $m[1];
            $mainUrl = $uploaded[$i]['url'] ?? null;
        }
        if ($mainUrl === null) {
            $mainUrl = $gallery[0]['url'];
        }

        $entity->setImage($mainUrl);
        $entity->setGalleryImages($gallery);
    }

    /**
     * @return array{0: string[], 1: string[]}
     */
    private function extractItinerary(array $data): array
    {
        $titles = [];
        $details = [];
        foreach ($data['itinerary'] ?? [] as $day) {
            $t = trim((string) ($day['title'] ?? ''));
            $d = trim((string) ($day['detail'] ?? ''));
            if ($t === '') continue;
            $titles[] = $t;
            $details[] = $d;
        }
        return [$titles, $details];
    }

    private function applyReview(object $entity, array $data, string $folder): void
    {
        $reviewName = trim((string) ($data['reviewName'] ?? ''));
        if ($reviewName !== '') {
            $entity->setReviewName($reviewName);
            $entity->setReviewCountry(trim((string) ($data['reviewCountry'] ?? '')) ?: null);
            $entity->setReviewRating((int) ($data['reviewRating'] ?? 0) ?: null);
            $entity->setReviewCommentFr(trim((string) ($data['reviewComment'] ?? '')) ?: null);

            $avatar = $data['reviewAvatar'] ?? null;
            if ($avatar instanceof UploadedFile) {
                $up = $this->uploader->upload($avatar->getPathname(), $folder . '/reviews');
                $entity->setReviewAvatar($up['url']);
            }
        } else {
            $entity->setReviewName(null);
            $entity->setReviewCountry(null);
            $entity->setReviewRating(null);
            $entity->setReviewCommentFr(null);
        }
    }

    /**
     * Un seul appel DeepL par langue, tous les textes d'un coup.
     */
    private function applyTranslationsGeneric(object $entity, array $source): void
    {
        $scalarFields = ['title', 'description', 'duration', 'fullDescription', 'itinerarySummary', 'reviewComment'];
        $listFields   = ['itinerary', 'itineraryDetail', 'included', 'excluded'];

        $flat = [];
        $map  = [];

        foreach ($scalarFields as $field) {
            $value = $source[$field] ?? null;
            if ($value === null || $value === '') continue;
            $k = 's_' . $field;
            $flat[$k] = (string) $value;
            $map[$k]  = ['type' => 'scalar', 'field' => $field];
        }
        foreach ($listFields as $field) {
            $values = $source[$field] ?? [];
            foreach (array_values($values) as $i => $value) {
                $value = trim((string) $value);
                if ($value === '') continue;
                $k = 'l_' . $field . '_' . $i;
                $flat[$k] = $value;
                $map[$k]  = ['type' => 'list', 'field' => $field, 'index' => $i];
            }
        }
        if ($flat === []) return;

        foreach (self::TRANSLATION_LANGS as $lang) {
            $L = ucfirst($lang);
            try {
                $translated = $this->translator->translate(array_values($flat), $lang);
                $rebuiltScalar = [];
                $rebuiltList   = [];
                $i = 0;
                foreach ($flat as $k => $_v) {
                    $info = $map[$k];
                    $value = $translated[$i] ?? null;
                    $i++;
                    if ($info['type'] === 'scalar') {
                        $rebuiltScalar[$info['field']] = $value;
                    } else {
                        $rebuiltList[$info['field']][$info['index']] = $value;
                    }
                }
                foreach ($rebuiltScalar as $field => $value) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}($value);
                }
                foreach ($rebuiltList as $field => $values) {
                    ksort($values);
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}(array_values($values));
                }
            } catch (\Throwable $e) {
                foreach ($scalarFields as $field) {
                    $value = $source[$field] ?? null;
                    if ($value === null || $value === '') continue;
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}($value);
                }
                foreach ($listFields as $field) {
                    $values = $source[$field] ?? [];
                    if (empty($values)) continue;
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}(array_values($values));
                }
            }
        }
    }

    private function applyTranslationsForCircuit(Circuit $c, array $data, string $titleFr, string $durationFr, string $descriptionFr, string $fullDescriptionFr, string $itinerarySummaryFr, array $itineraryFr, array $itineraryDetailFr, array $includedFr, array $excludedFr): void
    {
        $this->applyTranslationsGeneric($c, [
            'title' => $titleFr,
            'description' => $descriptionFr,
            'duration' => $durationFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => trim((string) ($data['reviewComment'] ?? '')) ?: null,
        ]);
    }

    private function applyTranslationsForExcursion(Excursion $e, array $data, string $titleFr, string $durationFr, string $descriptionFr, string $fullDescriptionFr, string $itinerarySummaryFr, array $itineraryFr, array $itineraryDetailFr, array $includedFr, array $excludedFr): void
    {
        $this->applyTranslationsGeneric($e, [
            'title' => $titleFr,
            'description' => $descriptionFr,
            'duration' => $durationFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => trim((string) ($data['reviewComment'] ?? '')) ?: null,
        ]);
    }

    /**
     * Traduit uniquement les champs dont la valeur FR a changé.
     */
    private function translateChangedFieldsGeneric(object $entity, array $newFr): void
    {
        $scalarGetters = [
            'title' => 'getTitleFr',
            'duration' => 'getDurationFr',
            'description' => 'getDescriptionFr',
            'fullDescription' => 'getFullDescriptionFr',
            'itinerarySummary' => 'getItinerarySummaryFr',
            'reviewComment' => 'getReviewCommentFr',
        ];
        $listGetters = [
            'itinerary' => 'getItineraryFr',
            'itineraryDetail' => 'getItineraryDetailFr',
            'included' => 'getIncludedFr',
            'excluded' => 'getExcludedFr',
        ];

        $changedScalars = [];
        foreach ($scalarGetters as $key => $getter) {
            $current = (string) ($entity->{$getter}() ?? '');
            $new = (string) ($newFr[$key] ?? '');
            if ($current !== $new) {
                $changedScalars[$key] = $new;
            }
        }

        $changedLists = [];
        foreach ($listGetters as $key => $getter) {
            $current = $entity->{$getter}();
            $new = $newFr[$key] ?? [];
            if ($current != $new) {
                $changedLists[$key] = $new;
            }
        }

        if (empty($changedScalars) && empty($changedLists)) {
            return;
        }

        foreach (self::TRANSLATION_LANGS as $lang) {
            $L = ucfirst($lang);
            $flat = [];
            $map = [];
            foreach ($changedScalars as $key => $value) {
                if ($value === '') continue;
                $k = 's_' . $key;
                $flat[$k] = $value;
                $map[$k] = ['type' => 'scalar', 'field' => $key];
            }
            foreach ($changedLists as $key => $values) {
                foreach (array_values($values) as $i => $value) {
                    $value = trim((string) $value);
                    if ($value === '') continue;
                    $k = 'l_' . $key . '_' . $i;
                    $flat[$k] = $value;
                    $map[$k] = ['type' => 'list', 'field' => $key, 'index' => $i];
                }
            }
            if ($flat === []) continue;

            try {
                $translated = $this->translator->translate(array_values($flat), $lang);
                $rebuiltScalar = [];
                $rebuiltList = [];
                $i = 0;
                foreach ($flat as $k => $_v) {
                    $info = $map[$k];
                    $value = $translated[$i] ?? null;
                    $i++;
                    if ($info['type'] === 'scalar') {
                        $rebuiltScalar[$info['field']] = $value;
                    } else {
                        $rebuiltList[$info['field']][$info['index']] = $value;
                    }
                }
                foreach ($rebuiltScalar as $field => $value) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}($value);
                }
                foreach ($rebuiltList as $field => $values) {
                    ksort($values);
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}(array_values($values));
                }
            } catch (\Throwable $e) {
                foreach ($changedScalars as $field => $value) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}($value);
                }
                foreach ($changedLists as $field => $values) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($entity, $setter)) $entity->{$setter}(array_values($values));
                }
            }
        }
    }

    private function translateChangedFieldsForCircuit(Circuit $c, array $data, string $titleFr, string $durationFr, string $descriptionFr, string $fullDescriptionFr, string $itinerarySummaryFr, array $itineraryFr, array $itineraryDetailFr, array $includedFr, array $excludedFr): void
    {
        // 1) Applique les valeurs FR
        $c->setTitleFr($titleFr);
        $c->setDurationFr($durationFr !== '' ? $durationFr : null);
        $c->setDescriptionFr($descriptionFr);
        $c->setFullDescriptionFr($fullDescriptionFr !== '' ? $fullDescriptionFr : null);
        $c->setItinerarySummaryFr($itinerarySummaryFr !== '' ? $itinerarySummaryFr : null);
        $c->setItineraryFr($itineraryFr);
        $c->setItineraryDetailFr($itineraryDetailFr);
        $c->setIncludedFr($includedFr);
        $c->setExcludedFr($excludedFr);

        // 2) Traduit les champs changés
        $this->translateChangedFieldsGeneric($c, [
            'title' => $titleFr,
            'duration' => $durationFr,
            'description' => $descriptionFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => trim((string) ($data['reviewComment'] ?? '')) ?: '',
        ]);
    }

    private function translateChangedFieldsForExcursion(Excursion $e, array $data, string $titleFr, string $durationFr, string $descriptionFr, string $fullDescriptionFr, string $itinerarySummaryFr, array $itineraryFr, array $itineraryDetailFr, array $includedFr, array $excludedFr): void
    {
        $e->setTitleFr($titleFr);
        $e->setDurationFr($durationFr !== '' ? $durationFr : null);
        $e->setDescriptionFr($descriptionFr);
        $e->setFullDescriptionFr($fullDescriptionFr !== '' ? $fullDescriptionFr : null);
        $e->setItinerarySummaryFr($itinerarySummaryFr !== '' ? $itinerarySummaryFr : null);
        $e->setItineraryFr($itineraryFr);
        $e->setItineraryDetailFr($itineraryDetailFr);
        $e->setIncludedFr($includedFr);
        $e->setExcludedFr($excludedFr);

        $this->translateChangedFieldsGeneric($e, [
            'title' => $titleFr,
            'duration' => $durationFr,
            'description' => $descriptionFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => trim((string) ($data['reviewComment'] ?? '')) ?: '',
        ]);
    }

    private function mergeTags(array $selected, array $custom): array
    {
        $seen = [];
        $result = [];
        foreach (array_merge(array_values($selected), array_values($custom)) as $tag) {
            $tag = trim((string) $tag);
            if ($tag === '') continue;
            $key = mb_strtolower($tag);
            if (isset($seen[$key])) continue;
            $seen[$key] = true;
            $result[] = $tag;
        }
        return $result;
    }

    private function iconsFor(array $tags, array $catalog): array
    {
        $icons = [];
        foreach ($tags as $tag) {
            if (isset($catalog[$tag])) {
                $icons[] = $catalog[$tag];
            }
        }
        return $icons;
    }
}