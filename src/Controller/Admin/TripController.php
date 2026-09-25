<?php

namespace App\Controller\Admin;

use App\Entity\Circuit;
use App\Form\Admin\TripChoices;
use App\Form\Admin\TripType;
use App\Repository\CircuitRepository;
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
    ) {}

    // ==================================================================
    // LISTE
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

        $circuit = $this->requireItem($type, $id);

        $form = $this->createForm(TripType::class, $this->circuitToFormData($circuit));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->updateCircuit($circuit, $form->getData());

                $this->em->flush();

                $this->addFlash('success', sprintf(
                    'Le circuit « %s » a été mis à jour.',
                    $circuit->getTitleFr()
                ));

                return $this->redirectToRoute('admin_trip_index', ['type' => $type]);
            } catch (\Throwable $e) {
                $this->addFlash('error', "Erreur lors de la mise à jour : " . $e->getMessage());
            }
        }

        $existingImages = $circuit->getGalleryImages();

        return $this->render('admin/trip/edit.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'form' => $form->createView(),
            'existingImages' => $existingImages,
            'mainExistingIndex' => $this->findMainExistingIndex($circuit, $existingImages),
            'currentAvatarUrl' => $circuit->getReviewAvatar(),
        ]);
    }

    /**
     * Circuit → données de formulaire TripType.
     */
    private function circuitToFormData(Circuit $circuit): array
    {
        // Itinéraire : recompose les paires (titre, détail)
        $itinerary = [];
        $titles = $circuit->getItineraryFr();
        $details = $circuit->getItineraryDetailFr();
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

        [$includedItems, $includedCustom] = $this->splitTags($circuit->getIncludedFr(), TripChoices::INCLUDED);
        [$excludedItems, $excludedCustom] = $this->splitTags($circuit->getExcludedFr(), TripChoices::EXCLUDED);

        return [
            'title' => $circuit->getTitleFr(),
            'duration' => $circuit->getDurationFr(),
            'description' => $circuit->getDescriptionFr(),
            'fullDescription' => $circuit->getFullDescriptionFr(),
            'itinerarySummary' => $circuit->getItinerarySummaryFr(),
            'itinerary' => $itinerary,
            'includedItems' => $includedItems,
            'includedCustom' => $includedCustom,
            'excludedItems' => $excludedItems,
            'excludedCustom' => $excludedCustom,
            'reviewName' => $circuit->getReviewName(),
            'reviewCountry' => $circuit->getReviewCountry(),
            'reviewRating' => $circuit->getReviewRating(),
            'reviewComment' => $circuit->getReviewCommentFr(),
            'mainImageIndex' => 0,
            'mainImageKey' => '',
            'existingImages' => '',
        ];
    }

    /**
     * Sépare les étiquettes : catalogue (checkboxes) vs. personnalisées (chips).
     *
     * @return array{0: string[], 1: string[]}
     */
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

    /**
     * Index de l'image principale actuelle dans la galerie (-1 si non trouvée).
     */
    private function findMainExistingIndex(Circuit $circuit, array $gallery): int
    {
        $mainUrl = $circuit->getImage();
        foreach ($gallery as $i => $img) {
            if (($img['url'] ?? null) === $mainUrl) {
                return $i;
            }
        }
        return -1;
    }

    /**
     * Applique les modifications du formulaire au circuit.
     */
    private function updateCircuit(Circuit $c, array $data): void
    {
        // ---------- 1. IMAGES ----------
        // Images existantes (JSON depuis le champ caché)
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

        // Nouvelles images uploadées
        /** @var UploadedFile[] $newFiles */
        $newFiles = $data['images'] ?? [];
        $uploaded = [];
        foreach ($newFiles as $file) {
            $result = $this->uploader->upload($file->getPathname(), 'circuits');
            $uploaded[] = ['url' => $result['url'], 'title' => ''];
        }

        $gallery = array_merge($existing, $uploaded);
        if (count($gallery) === 0) {
            throw new \RuntimeException('Ajoutez au moins une image.');
        }

        // Image principale : "existing:N", "new:N", fallback = première
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

        $c->setImage($mainUrl);
        $c->setGalleryImages($gallery);

        // ---------- 2. TEXTES FR ----------
        $titleFr = trim((string) ($data['title'] ?? ''));
        if ($titleFr === '') {
            throw new \RuntimeException('Le titre est obligatoire.');
        }
        $durationFr = trim((string) ($data['duration'] ?? ''));
        $descriptionFr = trim((string) ($data['description'] ?? ''));
        $fullDescriptionFr = trim((string) ($data['fullDescription'] ?? ''));
        $itinerarySummaryFr = trim((string) ($data['itinerarySummary'] ?? ''));

        $itineraryFr = [];
        $itineraryDetailFr = [];
        foreach ($data['itinerary'] ?? [] as $day) {
            $t = trim((string) ($day['title'] ?? ''));
            $d = trim((string) ($day['detail'] ?? ''));
            if ($t === '') {
                continue;
            }
            $itineraryFr[] = $t;
            $itineraryDetailFr[] = $d;
        }

        $includedFr = $this->mergeTags($data['includedItems'] ?? [], $data['includedCustom'] ?? []);
        $excludedFr = $this->mergeTags($data['excludedItems'] ?? [], $data['excludedCustom'] ?? []);

        $reviewName = trim((string) ($data['reviewName'] ?? ''));
        $reviewCommentFr = $reviewName !== ''
            ? trim((string) ($data['reviewComment'] ?? ''))
            : '';

        // ---------- 3. TRADUCTIONS : uniquement les champs changés ----------
        $this->translateChangedFields($c, [
            'title' => $titleFr,
            'duration' => $durationFr,
            'description' => $descriptionFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => $reviewCommentFr,
        ]);

        // ---------- 4. APPLICATION DES VALEURS FR ----------
        $c->setTitleFr($titleFr);
        $c->setDurationFr($durationFr !== '' ? $durationFr : null);
        $c->setDescriptionFr($descriptionFr);
        $c->setFullDescriptionFr($fullDescriptionFr !== '' ? $fullDescriptionFr : null);
        $c->setItinerarySummaryFr($itinerarySummaryFr !== '' ? $itinerarySummaryFr : null);
        $c->setItineraryFr($itineraryFr);
        $c->setItineraryDetailFr($itineraryDetailFr);
        $c->setIncludedFr($includedFr);
        $c->setExcludedFr($excludedFr);
        $c->setIncludedIcons($this->iconsFor($includedFr, TripChoices::INCLUDED));
        $c->setExcludedIcons($this->iconsFor($excludedFr, TripChoices::EXCLUDED));

        if ($reviewName !== '') {
            $c->setReviewName($reviewName);
            $c->setReviewCountry(trim((string) ($data['reviewCountry'] ?? '')) ?: null);
            $c->setReviewRating((int) ($data['reviewRating'] ?? 0) ?: null);
            $c->setReviewCommentFr($reviewCommentFr ?: null);

            $avatar = $data['reviewAvatar'] ?? null;
            if ($avatar instanceof UploadedFile) {
                $up = $this->uploader->upload($avatar->getPathname(), 'circuits/reviews');
                $c->setReviewAvatar($up['url']);
            }
        } else {
            $c->setReviewName(null);
            $c->setReviewCountry(null);
            $c->setReviewRating(null);
            $c->setReviewCommentFr(null);
        }
    }

    /**
     * Traduit uniquement les champs dont la valeur FR a changé.
     */
    private function translateChangedFields(Circuit $c, array $newFr): void
    {
        // Champs scalaires : [clé => getter FR actuel]
        $scalarGetters = [
            'title' => 'getTitleFr',
            'duration' => 'getDurationFr',
            'description' => 'getDescriptionFr',
            'fullDescription' => 'getFullDescriptionFr',
            'itinerarySummary' => 'getItinerarySummaryFr',
            'reviewComment' => 'getReviewCommentFr',
        ];

        // Champs listes : [clé => getter FR actuel]
        $listGetters = [
            'itinerary' => 'getItineraryFr',
            'itineraryDetail' => 'getItineraryDetailFr',
            'included' => 'getIncludedFr',
            'excluded' => 'getExcludedFr',
        ];

        // Détermine les champs modifiés
        $changedScalars = [];
        foreach ($scalarGetters as $key => $getter) {
            $current = (string) ($c->{$getter}() ?? '');
            $new = (string) ($newFr[$key] ?? '');
            if ($current !== $new) {
                $changedScalars[$key] = $new;
            }
        }

        $changedLists = [];
        foreach ($listGetters as $key => $getter) {
            $current = $c->{$getter}();
            $new = $newFr[$key] ?? [];
            if ($current != $new) {
                $changedLists[$key] = $new;
            }
        }

        if (empty($changedScalars) && empty($changedLists)) {
            return; // rien à traduire
        }

        // Un seul appel DeepL par langue
        foreach (self::TRANSLATION_LANGS as $lang) {
            $L = ucfirst($lang);

            // Prépare le tableau plat
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
                    if (method_exists($c, $setter)) {
                        $c->{$setter}($value);
                    }
                }
                foreach ($rebuiltList as $field => $values) {
                    ksort($values);
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) {
                        $c->{$setter}(array_values($values));
                    }
                }
            } catch (\Throwable $e) {
                // Repli : recopie le FR pour les champs modifiés
                foreach ($changedScalars as $field => $value) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) {
                        $c->{$setter}($value);
                    }
                }
                foreach ($changedLists as $field => $values) {
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) {
                        $c->{$setter}(array_values($values));
                    }
                }
            }
        }
    }

    // ==================================================================
    // SUPPRIMER (soft) / RESTAURER / PURGER (hard)
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

            try {
                if ($type === 'circuits') {
                    $circuit = $this->buildCircuit($data);
                    $this->em->persist($circuit);
                    $this->em->flush();

                    $this->addFlash('success', sprintf(
                        'Le circuit « %s » a bien été enregistré.',
                        $circuit->getTitleFr()
                    ));

                    return $this->redirectToRoute('app_font_detail', [
                        'type' => 'circuit',
                        'id' => $circuit->getId(),
                    ]);
                }

                $this->addFlash('error', "L'ajout d'excursions n'est pas encore disponible.");
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
     * @return Circuit[]
     */
    private function loadItems(string $type): array
    {
        if ($type === 'circuits') {
            return $this->circuitRepository->findPublished();
        }
        return [];
    }

    /**
     * @return Circuit[]
     */
    private function loadTrashedItems(string $type): array
    {
        if ($type === 'circuits') {
            return $this->circuitRepository->findTrashed();
        }
        return [];
    }

    private function requireItem(string $type, int $id, bool $allowTrashed = false): Circuit
    {
        if ($type !== 'circuits') {
            throw $this->createNotFoundException("Type non supporté : {$type}");
        }

        $item = $this->circuitRepository->find($id);
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

    private function deleteCloudinaryAssets(Circuit $circuit): void
    {
        $publicIds = [];

        $mainPid = $this->publicIdFromUrl($circuit->getImage());
        if ($mainPid !== null) {
            $publicIds[] = $mainPid;
        }

        foreach ($circuit->getGalleryImages() as $img) {
            $url = $img['url'] ?? null;
            if (!is_string($url)) continue;
            $pid = $this->publicIdFromUrl($url);
            if ($pid !== null) {
                $publicIds[] = $pid;
            }
        }

        $avatarPid = $this->publicIdFromUrl($circuit->getReviewAvatar());
        if ($avatarPid !== null) {
            $publicIds[] = $avatarPid;
        }

        foreach (array_unique($publicIds) as $pid) {
            try {
                $this->uploader->delete($pid);
            } catch (\Throwable $e) {
                // Ignore : une image absente ne doit pas bloquer
            }
        }
    }

    /**
     * https://res.cloudinary.com/<cloud>/image/upload/v123/baroudeurs/circuits/abc.webp
     * → "baroudeurs/circuits/abc"
     */
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
    // CRÉATION
    // ==================================================================

    private function buildCircuit(array $data): Circuit
    {
        $c = new Circuit();

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
        foreach ($images as $i => $file) {
            $result = $this->uploader->upload($file->getPathname(), 'circuits');
            $uploaded[] = [
                'url' => $result['url'],
                'publicId' => $result['publicId'],
                'isMain' => $i === $mainIndex,
            ];
        }

        $mainUpload = $uploaded[$mainIndex];
        $c->setImage($mainUpload['url']);

        $c->setGalleryImages(array_map(
            static fn (array $u): array => ['url' => $u['url'], 'title' => ''],
            $uploaded
        ));

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

        $itineraryFr = [];
        $itineraryDetailFr = [];
        foreach ($data['itinerary'] ?? [] as $day) {
            $dayTitle = trim((string) ($day['title'] ?? ''));
            $dayDetail = trim((string) ($day['detail'] ?? ''));
            if ($dayTitle === '') continue;
            $itineraryFr[] = $dayTitle;
            $itineraryDetailFr[] = $dayDetail;
        }
        $c->setItineraryFr($itineraryFr);
        $c->setItineraryDetailFr($itineraryDetailFr);

        $includedFr = $this->mergeTags($data['includedItems'] ?? [], $data['includedCustom'] ?? []);
        $excludedFr = $this->mergeTags($data['excludedItems'] ?? [], $data['excludedCustom'] ?? []);
        $c->setIncludedFr($includedFr);
        $c->setExcludedFr($excludedFr);

        $c->setIncludedIcons($this->iconsFor($includedFr, TripChoices::INCLUDED));
        $c->setExcludedIcons($this->iconsFor($excludedFr, TripChoices::EXCLUDED));
        $c->setIcons(TripChoices::DEFAULT_CARD_ICONS);

        $reviewName = trim((string) ($data['reviewName'] ?? ''));
        if ($reviewName !== '') {
            $c->setReviewName($reviewName);
            $c->setReviewCountry(trim((string) ($data['reviewCountry'] ?? '')) ?: null);
            $c->setReviewRating((int) ($data['reviewRating'] ?? 0) ?: null);
            $c->setReviewCommentFr(trim((string) ($data['reviewComment'] ?? '')) ?: null);

            $avatar = $data['reviewAvatar'] ?? null;
            if ($avatar instanceof UploadedFile) {
                $up = $this->uploader->upload($avatar->getPathname(), 'circuits/reviews');
                $c->setReviewAvatar($up['url']);
            }
        }

        $maxPos = (int) $this->em->getConnection()
            ->fetchOne('SELECT COALESCE(MAX(position), 0) FROM circuit');
        $c->setPosition($maxPos + 1);

        $this->applyTranslations($c, [
            'title' => $titleFr,
            'description' => $descriptionFr,
            'duration' => $durationFr,
            'fullDescription' => $fullDescriptionFr,
            'itinerarySummary' => $itinerarySummaryFr,
            'itinerary' => $itineraryFr,
            'itineraryDetail' => $itineraryDetailFr,
            'included' => $includedFr,
            'excluded' => $excludedFr,
            'reviewComment' => $reviewName !== ''
                ? trim((string) ($data['reviewComment'] ?? ''))
                : null,
        ]);

        return $c;
    }

    private function applyTranslations(Circuit $c, array $source): void
    {
        $scalarFields = ['title', 'description', 'duration', 'fullDescription', 'itinerarySummary', 'reviewComment'];
        $listFields   = ['itinerary', 'itineraryDetail', 'included', 'excluded'];

        $flat = [];
        $map  = [];

        foreach ($scalarFields as $field) {
            $value = $source[$field] ?? null;
            if ($value === null || $value === '') continue;
            $key = 's_' . $field;
            $flat[$key] = (string) $value;
            $map[$key]  = ['type' => 'scalar', 'field' => $field];
        }
        foreach ($listFields as $field) {
            $values = $source[$field] ?? [];
            foreach (array_values($values) as $i => $value) {
                $value = trim((string) $value);
                if ($value === '') continue;
                $key = 'l_' . $field . '_' . $i;
                $flat[$key] = $value;
                $map[$key]  = ['type' => 'list', 'field' => $field, 'index' => $i];
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
                foreach ($flat as $key => $_original) {
                    $info = $map[$key];
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
                    if (method_exists($c, $setter)) $c->{$setter}($value);
                }
                foreach ($rebuiltList as $field => $values) {
                    ksort($values);
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) $c->{$setter}(array_values($values));
                }
            } catch (\Throwable $e) {
                foreach ($scalarFields as $field) {
                    $value = $source[$field] ?? null;
                    if ($value === null || $value === '') continue;
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) $c->{$setter}($value);
                }
                foreach ($listFields as $field) {
                    $values = $source[$field] ?? [];
                    if (empty($values)) continue;
                    $setter = 'set' . ucfirst($field) . $L;
                    if (method_exists($c, $setter)) $c->{$setter}(array_values($values));
                }
            }
        }
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