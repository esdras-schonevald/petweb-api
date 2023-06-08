<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603180132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'truncate table usuario on cascade';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE TABLE usuario CASCADE');
        $this->addSql('TRUNCATE TABLE conta CASCADE');
        $this->addSql('TRUNCATE TABLE pessoa_fisica CASCADE');
        $this->addSql('TRUNCATE TABLE pessoa_juridica CASCADE');
        $this->addSql('TRUNCATE TABLE pessoa CASCADE');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT fk_2265b05ddf6fa0a5');
        $this->addSql('DROP INDEX uniq_2265b05ddf6fa0a5');
        $this->addSql('ALTER TABLE usuario ALTER conta_id SET NOT NULL');
        $this->addSql('ALTER TABLE usuario RENAME COLUMN pessoa_id TO pessoa_fisica_id');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D8679B4F7 FOREIGN KEY (pessoa_fisica_id) REFERENCES pessoa_fisica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D8679B4F7 ON usuario (pessoa_fisica_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT FK_2265B05D8679B4F7');
        $this->addSql('DROP INDEX UNIQ_2265B05D8679B4F7');
        $this->addSql('ALTER TABLE usuario ALTER conta_id DROP NOT NULL');
        $this->addSql('ALTER TABLE usuario RENAME COLUMN pessoa_fisica_id TO pessoa_id');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT fk_2265b05ddf6fa0a5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_2265b05ddf6fa0a5 ON usuario (pessoa_id)');
    }
}
