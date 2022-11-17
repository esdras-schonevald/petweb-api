<?php

declare(strict_types=1);

namespace App\ORM\Driver;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;


class PostgresDriver
{
    public static function getConnection(): Connection
    {
        return DriverManager::getConnection([
            "driver"    =>  $_ENV["POSTGRES_DRIVER"],
            "host"      =>  $_ENV["POSTGRES_REMOTE_HOST"],
            "dbname"    =>  $_ENV["POSTGRES_DB"],
            "user"      =>  $_ENV["POSTGRES_USER"],
            "password"  =>  $_ENV["POSTGRES_PASSWORD"],
            "port"      =>  $_ENV["POSTGRES_REMOTE_PORT"],
            "charset"   =>  $_ENV["POSTGRES_CHARSET"]
        ]);
    }
}
