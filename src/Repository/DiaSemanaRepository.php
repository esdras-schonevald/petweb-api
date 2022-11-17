<?php

namespace App\Repository;

use App\Entity\DiaSemana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiaSemana>
 *
 * @method DiaSemana|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiaSemana|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiaSemana[]    findAll()
 * @method DiaSemana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiaSemanaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiaSemana::class);
    }

    public function save(DiaSemana $entity, bool $flush = false): void
    {   //throw new Exception ("Can not be inserted");
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DiaSemana $entity, bool $flush = false): void
    {   //throw new Exception ("Can not be removed");
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DiaSemana[] Returns an array of DiaSemana objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DiaSemana
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
