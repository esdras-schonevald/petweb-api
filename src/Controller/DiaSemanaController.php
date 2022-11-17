<?php

declare (strict_types=1);

namespace App\Controller;

use App\Entity\DiaSemana;
use App\ORM\Driver\PostgresDriver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiaSemanaController extends AbstractController
{
    public function find($id): JsonResponse
    {
        return $this->json(
            data: (
                new EntityManager(
                    PostgresDriver::getConnection(),
                    ORMSetup::createAttributeMetadataConfiguration(
                        paths: [__DIR__ . "/../Entity"],
                        isDevMode: true
                    )
                )
            )
                ->createQueryBuilder()
                ->select('ds')
                ->from(DiaSemana::class, 'ds')
                ->where("ds.id = :id")
                ->getQuery()
                ->setParameter("id", $id)
                ->getResult()
        );
    }

    public function findAll(): JsonResponse
    {
        return $this->json(
            data: (
                new EntityManager(
                    PostgresDriver::getConnection(),
                    ORMSetup::createAttributeMetadataConfiguration(
                        paths: [__DIR__ . "/../Entity"],
                        isDevMode: true
                    )
                )
            )
                ->createQueryBuilder()
                ->select('ds')
                ->from(DiaSemana::class, 'ds')
                ->getQuery()
                ->getResult()
        );
    }
}
