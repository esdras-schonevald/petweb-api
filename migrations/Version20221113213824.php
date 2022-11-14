<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113213824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT fk_1cdfab823a5a5d4');
        $this->addSql('DROP INDEX idx_1cdfab823a5a5d4');
        $this->addSql('ALTER TABLE pessoa RENAME COLUMN id_endereco_id TO endereco_id');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB821BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1CDFAB821BB76823 ON pessoa (endereco_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB821BB76823');
        $this->addSql('DROP INDEX IDX_1CDFAB821BB76823');
        $this->addSql('ALTER TABLE pessoa RENAME COLUMN endereco_id TO id_endereco_id');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT fk_1cdfab823a5a5d4 FOREIGN KEY (id_endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1cdfab823a5a5d4 ON pessoa (id_endereco_id)');
    }
}
