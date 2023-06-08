<?php

namespace Petweb\Api\Repository;

use Petweb\Api\Entity\PessoaFisica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PessoaFisica>
 *
 * @method PessoaFisica|null find($id, $lockMode = null, $lockVersion = null)
 * @method PessoaFisica|null findOneBy(array $criteria, array $orderBy = null)
 * @method PessoaFisica[]    findAll()
 * @method PessoaFisica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PessoaFisicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PessoaFisica::class);
    }

    public function save(PessoaFisica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PessoaFisica $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('pf')
            ->select('pf.nome, p.telefone')
            ->innerJoin(Pessoa::class, 'p', Expr\Join::WITH, 'p=pf.pessoa')
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return PessoaFisica[] Returns an array of PessoaFisica objects
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

    //    public function findOneBySomeField($value): ?PessoaFisica
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
