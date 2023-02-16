<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216044308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP CONSTRAINT fk_5e90f6d6fd02f13');
        $this->addSql('DROP INDEX idx_5e90f6d6fd02f13');
        $this->addSql('ALTER TABLE inscription DROP evenement_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inscription ADD evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT fk_5e90f6d6fd02f13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_5e90f6d6fd02f13 ON inscription (evenement_id)');
    }
}
