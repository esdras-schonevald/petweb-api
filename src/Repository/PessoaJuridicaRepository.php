<?php

namespace Petweb\Api\Repository;

use Petweb\Api\Entity\PessoaJuridica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PessoaJuridica>
 *
 * @method PessoaJuridica|null find($id, $lockMode = null, $lockVersion = null)
 * @method PessoaJuridica|null findOneBy(array $criteria, array $orderBy = null)
 * @method PessoaJuridica[]    findAll()
 * @method PessoaJuridica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PessoaJuridicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PessoaJuridica::class);
    }

    public function save(PessoaJuridica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PessoaJuridica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return PessoaJuridica[] Returns an array of PessoaJuridica objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PessoaJuridica
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
