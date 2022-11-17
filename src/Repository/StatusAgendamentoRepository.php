<?php

namespace App\Repository;

use App\Entity\StatusAgendamento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StatusAgendamento>
 *
 * @method StatusAgendamento|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusAgendamento|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusAgendamento[]    findAll()
 * @method StatusAgendamento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusAgendamentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusAgendamento::class);
    }

    public function save(StatusAgendamento $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StatusAgendamento $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StatusAgendamento[] Returns an array of StatusAgendamento objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StatusAgendamento
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
