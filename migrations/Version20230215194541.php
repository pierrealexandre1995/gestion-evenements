<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215194541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement ADD nom_evenement VARCHAR(150) NOT NULL');
        $this->addSql('ALTER TABLE evenement ALTER nombre_inscrit SET DEFAULT 0');
        $this->addSql('ALTER TABLE evenement ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE inscription ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inscription ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE evenement DROP nom_evenement');
        $this->addSql('ALTER TABLE evenement ALTER nombre_inscrit DROP DEFAULT');
        $this->addSql('ALTER TABLE evenement ALTER created_at DROP DEFAULT');
    }
}
