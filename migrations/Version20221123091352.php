<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123091352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pessoa_fisica DROP CONSTRAINT fk_35af33755f5a1c82');
        $this->addSql('DROP INDEX uniq_35af33755f5a1c82');
        $this->addSql('ALTER TABLE pessoa_fisica RENAME COLUMN id_pessoa_id TO pessoa_id');
        $this->addSql('ALTER TABLE pessoa_fisica ADD CONSTRAINT FK_35AF3375DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_35AF3375DF6FA0A5 ON pessoa_fisica (pessoa_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE pessoa_fisica DROP CONSTRAINT FK_35AF3375DF6FA0A5');
        $this->addSql('DROP INDEX UNIQ_35AF3375DF6FA0A5');
        $this->addSql('ALTER TABLE pessoa_fisica RENAME COLUMN pessoa_id TO id_pessoa_id');
        $this->addSql('ALTER TABLE pessoa_fisica ADD CONSTRAINT fk_35af33755f5a1c82 FOREIGN KEY (id_pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_35af33755f5a1c82 ON pessoa_fisica (id_pessoa_id)');
    }
}
