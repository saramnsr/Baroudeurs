<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260912173909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE excursion (id INT NOT NULL, image VARCHAR(500) NOT NULL, title_fr VARCHAR(255) NOT NULL, title_en VARCHAR(255) NOT NULL, title_ar VARCHAR(255) NOT NULL, title_it VARCHAR(255) NOT NULL, description_fr TEXT NOT NULL, description_en TEXT NOT NULL, description_ar TEXT NOT NULL, description_it TEXT NOT NULL, duration_fr VARCHAR(100) DEFAULT NULL, duration_en VARCHAR(100) DEFAULT NULL, duration_ar VARCHAR(100) DEFAULT NULL, duration_it VARCHAR(100) DEFAULT NULL, icons JSON NOT NULL, position INT NOT NULL, included_fr JSON NOT NULL, included_en JSON NOT NULL, included_ar JSON NOT NULL, included_it JSON NOT NULL, intro_fr TEXT DEFAULT NULL, intro_en TEXT DEFAULT NULL, intro_ar TEXT DEFAULT NULL, intro_it TEXT DEFAULT NULL, full_description_fr TEXT DEFAULT NULL, full_description_en TEXT DEFAULT NULL, full_description_ar TEXT DEFAULT NULL, full_description_it TEXT DEFAULT NULL, itinerary_summary_fr TEXT DEFAULT NULL, itinerary_summary_en TEXT DEFAULT NULL, itinerary_summary_ar TEXT DEFAULT NULL, itinerary_summary_it TEXT DEFAULT NULL, itinerary_fr JSON NOT NULL, itinerary_en JSON NOT NULL, itinerary_ar JSON NOT NULL, itinerary_it JSON NOT NULL, itinerary_detail_fr JSON NOT NULL, itinerary_detail_en JSON NOT NULL, itinerary_detail_ar JSON NOT NULL, itinerary_detail_it JSON NOT NULL, excluded_fr JSON NOT NULL, excluded_en JSON NOT NULL, excluded_ar JSON NOT NULL, excluded_it JSON NOT NULL, included_icons JSON NOT NULL, excluded_icons JSON NOT NULL, meals_breakfast_fr VARCHAR(255) DEFAULT NULL, meals_breakfast_en VARCHAR(255) DEFAULT NULL, meals_breakfast_ar VARCHAR(255) DEFAULT NULL, meals_breakfast_it VARCHAR(255) DEFAULT NULL, meals_lunch_fr VARCHAR(255) DEFAULT NULL, meals_lunch_en VARCHAR(255) DEFAULT NULL, meals_lunch_ar VARCHAR(255) DEFAULT NULL, meals_lunch_it VARCHAR(255) DEFAULT NULL, meals_dinner_fr VARCHAR(255) DEFAULT NULL, meals_dinner_en VARCHAR(255) DEFAULT NULL, meals_dinner_ar VARCHAR(255) DEFAULT NULL, meals_dinner_it VARCHAR(255) DEFAULT NULL, gallery_images JSON NOT NULL, closing_fr TEXT DEFAULT NULL, closing_en TEXT DEFAULT NULL, closing_ar TEXT DEFAULT NULL, closing_it TEXT DEFAULT NULL, review_avatar VARCHAR(255) DEFAULT NULL, review_name VARCHAR(255) DEFAULT NULL, review_country VARCHAR(255) DEFAULT NULL, review_rating INT DEFAULT NULL, review_comment_fr TEXT DEFAULT NULL, review_comment_en TEXT DEFAULT NULL, review_comment_ar TEXT DEFAULT NULL, review_comment_it TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE excursion');
    }
}
