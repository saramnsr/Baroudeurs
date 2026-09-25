<?php

namespace App\Repository;

use App\Entity\Circuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CircuitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Circuit::class);
    }

    /**
     * Circuits visibles (hors corbeille), dans l'ordre d'affichage.
     *
     * @return Circuit[]
     */
    public function findPublished(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.deletedAt IS NULL')
            ->orderBy('c.position', 'ASC')
            ->addOrderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Circuits dans la corbeille, les plus récemment supprimés en premier.
     *
     * @return Circuit[]
     */
    public function findTrashed(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.deletedAt IS NOT NULL')
            ->orderBy('c.deletedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Un circuit visible (null s'il n'existe pas ou s'il est dans la corbeille).
     */
    public function findPublishedById(int $id): ?Circuit
    {
        return $this->findOneBy(['id' => $id, 'deletedAt' => null]);
    }

    /**
     * Autres circuits à recommander sur la page détail.
     *
     * @return Circuit[]
     */
    public function findRelated(Circuit $circuit, int $limit = 3): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.deletedAt IS NULL')
            ->andWhere('c.id != :id')
            ->setParameter('id', $circuit->getId())
            ->orderBy('c.position', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Liste légère pour le menu du header : id + titres.
     *
     * @return array<int, array{id: int, title: array<string, string>}>
     */
    public function findNavItems(): array
    {
        $rows = $this->createQueryBuilder('c')
            ->select('c.id, c.titleFr, c.titleEn, c.titleAr, c.titleIt')
            ->where('c.deletedAt IS NULL')
            ->orderBy('c.position', 'ASC')
            ->addOrderBy('c.id', 'ASC')
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