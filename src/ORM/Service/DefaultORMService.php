<?php

declare(strict_types=1);

namespace Petweb\Api\ORM\Service;

use Petweb\Api\ORM\Driver\PostgresDriver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\QueryBuilder;

abstract class DefaultORMService
{

    protected EntityManager $entityManager;
    protected QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->entityManager = new EntityManager(
            PostgresDriver::getConnection(),
            ORMSetup::createAttributeMetadataConfiguration(
                paths: [__DIR__ . "/../Entity"],
                isDevMode: true
            )
        );

        $this->queryBuilder = $this->entityManager->createQueryBuilder();
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    public function getQueryBuilder(): QueryBuilder
    {
        return $this->queryBuilder;
    }
}
