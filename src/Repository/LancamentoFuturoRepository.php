<?php

namespace Petweb\Api\Repository;

use Petweb\Api\Entity\LancamentoFuturo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LancamentoFuturo>
 *
 * @method LancamentoFuturo|null find($id, $lockMode = null, $lockVersion = null)
 * @method LancamentoFuturo|null findOneBy(array $criteria, array $orderBy = null)
 * @method LancamentoFuturo[]    findAll()
 * @method LancamentoFuturo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LancamentoFuturoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LancamentoFuturo::class);
    }

    public function save(LancamentoFuturo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LancamentoFuturo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return LancamentoFuturo[] Returns an array of LancamentoFuturo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LancamentoFuturo
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
