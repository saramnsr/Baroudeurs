<?php

namespace App\Controller\Admin;

use App\Form\Admin\TripType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Pages partagées circuits / excursions (ajouter, gérer, corbeille).
 * {type} = "circuits" ou "excursions".
 *
 * @Route("/admin/{type}", name="admin_trip_", requirements={"type"="circuits|excursions"})
 * @IsGranted("ROLE_ADMIN")
 */
class TripController extends AbstractController
{
    // Textes affichés selon le type
    private const LABELS = [
        'circuits' => [
            'singular' => 'circuit',
            'list_page' => 'Circuits',
            'add_title' => 'Ajouter un circuit',
        ],
        'excursions' => [
            'singular' => 'excursion',
            'list_page' => 'Excursions',
            'add_title' => 'Ajouter une excursion',
        ],
    ];

    /**
     * Ajouter un circuit ou une excursion.
     *
     * @Route("/ajouter", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, string $type): Response
    {
        // Données de départ : image principale = 1re image, un jour vide
        $form = $this->createForm(TripType::class, [
            'mainImageIndex' => 0,
            'itinerary' => [['title' => null, 'detail' => null]],
            'includedItems' => [],
            'includedCustom' => [],
            'excludedItems' => [],
            'excludedCustom' => [],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Étape A5 : envoi Cloudinary + traduction + enregistrement
            $this->addFlash('success', "Formulaire valide. L'enregistrement sera ajouté à l'étape A5.");

            return $this->redirectToRoute('admin_trip_add', ['type' => $type]);
        }

        return $this->render('admin/trip/add.html.twig', [
            'type' => $type,
            'labels' => self::LABELS[$type],
            'form' => $form->createView(),
        ]);
    }
}