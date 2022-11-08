<?php

declare (strict_types=1);

use Doctrine\DBAL\DriverManager;
use Symfony\Component\Dotenv\Dotenv;

include dirname(__DIR__) . "/vendor/autoload.php";

(new Dotenv)->load(dirname(__DIR__) . "/.env");

$conn = DriverManager::getConnection([
    "driver"    =>  $_ENV["POSTGRES_DRIVER"],
    "host"      =>  $_ENV["POSTGRES_HOST"],
    "dbname"    =>  $_ENV["POSTGRES_DB"],
    "user"      =>  $_ENV["POSTGRES_USER"],
    "password"  =>  $_ENV["POSTGRES_PASSWORD"],
    "port"      =>  $_ENV["POSTGRES_PORT"],
    "charset"   =>  $_ENV["POSTGRES_CHARSET"]
]);

$conn->beginTransaction();

$result = $conn->executeQuery(<<<SQL
    CREATE TABLE test (
        id SERIAL PRIMARY KEY,
        description VARCHAR(255)
    )
SQL);

$result = $conn->executeQuery(<<<SQL
    INSERT INTO test (description) VALUES ('uma descrição')
SQL);

$result = $conn->executeQuery(<<<SQL
    SELECT * FROM test
SQL);

$assoc = $result->fetchAllAssociative();

var_dump($assoc);
$conn->rollBack();