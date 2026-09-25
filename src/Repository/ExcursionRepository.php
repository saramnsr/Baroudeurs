<?php

namespace App\Repository;

use App\Entity\Excursion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ExcursionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Excursion::class);
    }

    /**
     * Excursions visibles (hors corbeille), dans l'ordre d'affichage.
     *
     * @return Excursion[]
     */
    public function findPublished(): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.deletedAt IS NULL')
            ->orderBy('e.position', 'ASC')
            ->addOrderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Excursions dans la corbeille, les plus récemment supprimées en premier.
     *
     * @return Excursion[]
     */
    public function findTrashed(): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.deletedAt IS NOT NULL')
            ->orderBy('e.deletedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Alias pour la front office (compat avec l'ancien code).
     *
     * @return Excursion[]
     */
    public function findAllOrdered(): array
    {
        return $this->findPublished();
    }

    /**
     * Une excursion visible (null si introuvable ou en corbeille).
     */
    public function findPublishedById(int $id): ?Excursion
    {
        return $this->findOneBy(['id' => $id, 'deletedAt' => null]);
    }

    /**
     * Autres excursions à recommander sur la page détail.
     *
     * @return Excursion[]
     */
    public function findRelated(Excursion $excursion, int $limit = 3): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.deletedAt IS NULL')
            ->andWhere('e.id != :id')
            ->setParameter('id', $excursion->getId())
            ->orderBy('e.position', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Liste légère pour le menu du header.
     *
     * @return array<int, array{id: int, title: array<string, string>}>
     */
    public function findNavItems(): array
    {
        $rows = $this->createQueryBuilder('e')
            ->select('e.id, e.titleFr, e.titleEn, e.titleAr, e.titleIt')
            ->where('e.deletedAt IS NULL')
            ->orderBy('e.position', 'ASC')
            ->addOrderBy('e.id', 'ASC')
            ->getQuery()
            ->getArrayResult();

        return array_map(static fn (array $row): array => [
            'id' => (int) $row['id'],
            'title' => [
                'fr' => $row['titleFr'],
                'en' => $row['titleEn'] ?: $row['titleFr'],
                'ar' => $row['titleAr'] ?: $row['titleFr'],
                'it' => $row['titleIt'] ?: $row['titleFr'],
            ],
        ], $rows);
    }
}