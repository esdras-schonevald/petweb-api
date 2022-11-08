<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107005058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create table conta';
    }

    public function up(Schema $schema): void
    {
        $conta = $schema->createTable("conta");

        $conta->addColumn("id", Types::INTEGER)->setAutoincrement(true);
        $conta->addColumn("numero", Types::STRING);

        $conta->setPrimaryKey(["id"]);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable("conta");
    }
}