<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260911110935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circuit (id INT NOT NULL, image VARCHAR(255) NOT NULL, title_fr VARCHAR(255) NOT NULL, title_en VARCHAR(255) NOT NULL, title_ar VARCHAR(255) NOT NULL, title_it VARCHAR(255) NOT NULL, description_fr TEXT NOT NULL, description_en TEXT NOT NULL, description_ar TEXT NOT NULL, description_it TEXT NOT NULL, duration_fr VARCHAR(100) DEFAULT NULL, duration_en VARCHAR(100) DEFAULT NULL, duration_ar VARCHAR(100) DEFAULT NULL, duration_it VARCHAR(100) DEFAULT NULL, icons JSON NOT NULL, position INT NOT NULL, intro_fr TEXT DEFAULT NULL, intro_en TEXT DEFAULT NULL, intro_ar TEXT DEFAULT NULL, intro_it TEXT DEFAULT NULL, itinerary_fr JSON NOT NULL, itinerary_en JSON NOT NULL, itinerary_ar JSON NOT NULL, itinerary_it JSON NOT NULL, included_fr JSON NOT NULL, included_en JSON NOT NULL, included_ar JSON NOT NULL, included_it JSON NOT NULL, closing_fr TEXT DEFAULT NULL, closing_en TEXT DEFAULT NULL, closing_ar TEXT DEFAULT NULL, closing_it TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE circuit');
    }
}
