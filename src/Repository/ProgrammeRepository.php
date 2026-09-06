<?php

namespace App\Repository;

use App\Entity\Programme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Programme>
 *
 * @method Programme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Programme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Programme[]    findAll()
 * @method Programme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgrammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Programme::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Programme $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Programme $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findByFilters(?string $destination, ?string $duration, ?string $type): array
    {
        $qb = $this->createQueryBuilder('p');

        if ($destination) {
            $qb->andWhere('p.destination LIKE :destination')
               ->setParameter('destination', '%' . $destination . '%');
        }

        if ($type) {
            $qb->andWhere('p.type = :type')
               ->setParameter('type', $type);
        }

        if ($duration === '1') {
            $qb->andWhere('p.durationDays = 1');
        } elseif ($duration === '2-3') {
            $qb->andWhere('p.durationDays BETWEEN 2 AND 3');
        } elseif ($duration === '4+') {
            $qb->andWhere('p.durationDays >= 4');
        }

        return $qb->orderBy('p.durationDays', 'ASC')
                   ->getQuery()
                   ->getResult();
    }

      public function findFeatured(int $limit = 6): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.titleFr NOT IN (:excluded)')
            ->setParameter('excluded', [
                'Circuit 4x4 Douz - Tembaïne',
                'Circuit 4x4 - Sahara de Douz',
            ])
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

}
