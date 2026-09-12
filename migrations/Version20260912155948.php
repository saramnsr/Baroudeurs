<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260912155948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE circuit ADD itinerary_summary_fr TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD itinerary_summary_en TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD itinerary_summary_ar TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD itinerary_summary_it TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_country VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_rating INT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_comment_fr TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_comment_en TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_comment_ar TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD review_comment_it TEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE circuit DROP itinerary_summary_fr');
        $this->addSql('ALTER TABLE circuit DROP itinerary_summary_en');
        $this->addSql('ALTER TABLE circuit DROP itinerary_summary_ar');
        $this->addSql('ALTER TABLE circuit DROP itinerary_summary_it');
        $this->addSql('ALTER TABLE circuit DROP review_name');
        $this->addSql('ALTER TABLE circuit DROP review_country');
        $this->addSql('ALTER TABLE circuit DROP review_rating');
        $this->addSql('ALTER TABLE circuit DROP review_comment_fr');
        $this->addSql('ALTER TABLE circuit DROP review_comment_en');
        $this->addSql('ALTER TABLE circuit DROP review_comment_ar');
        $this->addSql('ALTER TABLE circuit DROP review_comment_it');
    }
}
