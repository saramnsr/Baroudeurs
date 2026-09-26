<?php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use App\Repository\CircuitRepository;
use App\Repository\ContactMessageRepository;
use App\Repository\ExcursionRepository;
use App\Repository\NewsletterRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractController
{
    public function __construct(
        private CircuitRepository $circuitRepository,
        private ExcursionRepository $excursionRepository,
        private ContactMessageRepository $contactMessageRepository,
        private NewsletterRepository $newsletterRepository,
    ) {}

    /**
     * @Route("", name="dashboard", methods={"GET"})
     */
    public function index(): Response
    {
        // ---- KPIs ----
        $circuitsCount = count($this->circuitRepository->findPublished());
        $excursionsCount = count($this->excursionRepository->findPublished());
        $messagesCount = $this->contactMessageRepository->countAll();
        $unreadCount = $this->contactMessageRepository->countUnread();

        // ---- Top 3 circuits & excursions (par vues) ----
        $topCircuits = $this->circuitRepository->createQueryBuilder('c')
            ->where('c.deletedAt IS NULL')
            ->orderBy('c.viewCount', 'DESC')
            ->addOrderBy('c.id', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        $topExcursions = $this->excursionRepository->createQueryBuilder('e')
            ->where('e.deletedAt IS NULL')
            ->orderBy('e.viewCount', 'DESC')
            ->addOrderBy('e.id', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        // ---- Inbox : 4 catégories séparées ----
        $recentContacts = $this->contactMessageRepository->findLatestByType(
            ContactMessage::TYPE_CONTACT, 5
        );
        $recentAvailabilities = $this->contactMessageRepository->findLatestByType(
            ContactMessage::TYPE_AVAILABILITY, 5
        );
        $recentBookings = $this->contactMessageRepository->findLatestByType(
            ContactMessage::TYPE_BOOKING, 5
        );

        // ---- Newsletter ----
        $recentNewsletter = $this->newsletterRepository->createQueryBuilder('n')
            ->orderBy('n.subscribedAt', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        $newsletterCount = (int) $this->newsletterRepository->createQueryBuilder('n')
            ->select('COUNT(n.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->render('admin/dashboard/index.html.twig', [
            'circuitsCount' => $circuitsCount,
            'excursionsCount' => $excursionsCount,
            'messagesCount' => $messagesCount,
            'unreadCount' => $unreadCount,
            'topCircuits' => $topCircuits,
            'topExcursions' => $topExcursions,
            'recentContacts' => $recentContacts,
            'recentAvailabilities' => $recentAvailabilities,
            'recentBookings' => $recentBookings,
            'recentNewsletter' => $recentNewsletter,
            'newsletterCount' => $newsletterCount,
        ]);
    }
}