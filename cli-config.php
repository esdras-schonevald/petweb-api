<?php

declare (strict_types=1);

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\JsonFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv)->load(__DIR__ . "/.env");

return DependencyFactory::fromEntityManager(
    new JsonFile('migrations.json'),
    new ExistingEntityManager(
        EntityManager::create([
                "driver"    =>  $_ENV["POSTGRES_DRIVER"],
                "host"      =>  $_ENV["POSTGRES_LOCAL_HOST"],
                "dbname"    =>  $_ENV["POSTGRES_DB"],
                "user"      =>  $_ENV["POSTGRES_USER"],
                "password"  =>  $_ENV["POSTGRES_PASSWORD"],
                "port"      =>  $_ENV["POSTGRES_LOCAL_PORT"],
                "charset"   =>  $_ENV["POSTGRES_CHARSET"]
            ],
            ORMSetup::createAnnotationMetadataConfiguration(
                [__DIR__ . "/src/Entity"],
                true
            )
        )
    )
);