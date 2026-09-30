<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Initial MySQL schema for the Baroudeurs project.
 * Creates: circuit, excursion, admin_user, contact_message, newsletter, testimonial.
 */
final class Version20261001120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initial MySQL schema.';
    }

    public function up(Schema $schema): void
    {
        // ---------------- circuit ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE circuit (
                id INT AUTO_INCREMENT NOT NULL,
                image VARCHAR(255) NOT NULL,
                title_fr VARCHAR(255) NOT NULL,
                title_en VARCHAR(255) NOT NULL,
                title_ar VARCHAR(255) NOT NULL,
                title_it VARCHAR(255) NOT NULL,
                description_fr LONGTEXT NOT NULL,
                description_en LONGTEXT NOT NULL,
                description_ar LONGTEXT NOT NULL,
                description_it LONGTEXT NOT NULL,
                duration_fr VARCHAR(100) DEFAULT NULL,
                duration_en VARCHAR(100) DEFAULT NULL,
                duration_ar VARCHAR(100) DEFAULT NULL,
                duration_it VARCHAR(100) DEFAULT NULL,
                icons JSON NOT NULL,
                position INT NOT NULL DEFAULT 0,
                intro_fr LONGTEXT DEFAULT NULL,
                intro_en LONGTEXT DEFAULT NULL,
                intro_ar LONGTEXT DEFAULT NULL,
                intro_it LONGTEXT DEFAULT NULL,
                full_description_fr LONGTEXT DEFAULT NULL,
                full_description_en LONGTEXT DEFAULT NULL,
                full_description_ar LONGTEXT DEFAULT NULL,
                full_description_it LONGTEXT DEFAULT NULL,
                itinerary_summary_fr LONGTEXT DEFAULT NULL,
                itinerary_summary_en LONGTEXT DEFAULT NULL,
                itinerary_summary_ar LONGTEXT DEFAULT NULL,
                itinerary_summary_it LONGTEXT DEFAULT NULL,
                itinerary_fr JSON NOT NULL,
                itinerary_en JSON NOT NULL,
                itinerary_ar JSON NOT NULL,
                itinerary_it JSON NOT NULL,
                itinerary_detail_fr JSON NOT NULL,
                itinerary_detail_en JSON NOT NULL,
                itinerary_detail_ar JSON NOT NULL,
                itinerary_detail_it JSON NOT NULL,
                included_fr JSON NOT NULL,
                included_en JSON NOT NULL,
                included_ar JSON NOT NULL,
                included_it JSON NOT NULL,
                excluded_fr JSON NOT NULL,
                excluded_en JSON NOT NULL,
                excluded_ar JSON NOT NULL,
                excluded_it JSON NOT NULL,
                included_icons JSON NOT NULL,
                excluded_icons JSON NOT NULL,
                gallery_images JSON NOT NULL,
                closing_fr LONGTEXT DEFAULT NULL,
                closing_en LONGTEXT DEFAULT NULL,
                closing_ar LONGTEXT DEFAULT NULL,
                closing_it LONGTEXT DEFAULT NULL,
                review_avatar VARCHAR(255) DEFAULT NULL,
                review_name VARCHAR(255) DEFAULT NULL,
                review_country VARCHAR(255) DEFAULT NULL,
                review_rating INT DEFAULT NULL,
                review_comment_fr LONGTEXT DEFAULT NULL,
                review_comment_en LONGTEXT DEFAULT NULL,
                review_comment_ar LONGTEXT DEFAULT NULL,
                review_comment_it LONGTEXT DEFAULT NULL,
                created_at DATETIME DEFAULT NULL,
                updated_at DATETIME DEFAULT NULL,
                deleted_at DATETIME DEFAULT NULL,
                view_count INT NOT NULL DEFAULT 0,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // ---------------- excursion ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE excursion (
                id INT AUTO_INCREMENT NOT NULL,
                created_at DATETIME DEFAULT NULL,
                updated_at DATETIME DEFAULT NULL,
                deleted_at DATETIME DEFAULT NULL,
                view_count INT NOT NULL DEFAULT 0,
                image VARCHAR(500) NOT NULL,
                title_fr VARCHAR(255) NOT NULL,
                title_en VARCHAR(255) NOT NULL,
                title_ar VARCHAR(255) NOT NULL,
                title_it VARCHAR(255) NOT NULL,
                description_fr LONGTEXT NOT NULL,
                description_en LONGTEXT NOT NULL,
                description_ar LONGTEXT NOT NULL,
                description_it LONGTEXT NOT NULL,
                duration_fr VARCHAR(100) DEFAULT NULL,
                duration_en VARCHAR(100) DEFAULT NULL,
                duration_ar VARCHAR(100) DEFAULT NULL,
                duration_it VARCHAR(100) DEFAULT NULL,
                icons JSON NOT NULL,
                position INT NOT NULL DEFAULT 0,
                included_fr JSON NOT NULL,
                included_en JSON NOT NULL,
                included_ar JSON NOT NULL,
                included_it JSON NOT NULL,
                intro_fr LONGTEXT DEFAULT NULL,
                intro_en LONGTEXT DEFAULT NULL,
                intro_ar LONGTEXT DEFAULT NULL,
                intro_it LONGTEXT DEFAULT NULL,
                full_description_fr LONGTEXT DEFAULT NULL,
                full_description_en LONGTEXT DEFAULT NULL,
                full_description_ar LONGTEXT DEFAULT NULL,
                full_description_it LONGTEXT DEFAULT NULL,
                itinerary_summary_fr LONGTEXT DEFAULT NULL,
                itinerary_summary_en LONGTEXT DEFAULT NULL,
                itinerary_summary_ar LONGTEXT DEFAULT NULL,
                itinerary_summary_it LONGTEXT DEFAULT NULL,
                itinerary_fr JSON NOT NULL,
                itinerary_en JSON NOT NULL,
                itinerary_ar JSON NOT NULL,
                itinerary_it JSON NOT NULL,
                itinerary_detail_fr JSON NOT NULL,
                itinerary_detail_en JSON NOT NULL,
                itinerary_detail_ar JSON NOT NULL,
                itinerary_detail_it JSON NOT NULL,
                excluded_fr JSON NOT NULL,
                excluded_en JSON NOT NULL,
                excluded_ar JSON NOT NULL,
                excluded_it JSON NOT NULL,
                included_icons JSON NOT NULL,
                excluded_icons JSON NOT NULL,
                meals_breakfast_fr VARCHAR(255) DEFAULT NULL,
                meals_breakfast_en VARCHAR(255) DEFAULT NULL,
                meals_breakfast_ar VARCHAR(255) DEFAULT NULL,
                meals_breakfast_it VARCHAR(255) DEFAULT NULL,
                meals_lunch_fr VARCHAR(255) DEFAULT NULL,
                meals_lunch_en VARCHAR(255) DEFAULT NULL,
                meals_lunch_ar VARCHAR(255) DEFAULT NULL,
                meals_lunch_it VARCHAR(255) DEFAULT NULL,
                meals_dinner_fr VARCHAR(255) DEFAULT NULL,
                meals_dinner_en VARCHAR(255) DEFAULT NULL,
                meals_dinner_ar VARCHAR(255) DEFAULT NULL,
                meals_dinner_it VARCHAR(255) DEFAULT NULL,
                gallery_images JSON NOT NULL,
                closing_fr LONGTEXT DEFAULT NULL,
                closing_en LONGTEXT DEFAULT NULL,
                closing_ar LONGTEXT DEFAULT NULL,
                closing_it LONGTEXT DEFAULT NULL,
                review_avatar VARCHAR(255) DEFAULT NULL,
                review_name VARCHAR(255) DEFAULT NULL,
                review_country VARCHAR(255) DEFAULT NULL,
                review_rating INT DEFAULT NULL,
                review_comment_fr LONGTEXT DEFAULT NULL,
                review_comment_en LONGTEXT DEFAULT NULL,
                review_comment_ar LONGTEXT DEFAULT NULL,
                review_comment_it LONGTEXT DEFAULT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // ---------------- admin_user ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE admin_user (
                id INT AUTO_INCREMENT NOT NULL,
                email VARCHAR(180) NOT NULL,
                roles JSON NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at DATETIME NOT NULL,
                last_login_at DATETIME DEFAULT NULL,
                UNIQUE INDEX uniq_admin_user_email (email),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // ---------------- contact_message ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE contact_message (
                id INT AUTO_INCREMENT NOT NULL,
                type VARCHAR(32) NOT NULL,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(255) DEFAULT NULL,
                message LONGTEXT DEFAULT NULL,
                extra JSON DEFAULT NULL,
                is_read TINYINT(1) NOT NULL DEFAULT 0,
                created_at DATETIME NOT NULL,
                INDEX idx_contact_message_type (type),
                INDEX idx_contact_message_created (created_at),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // ---------------- newsletter ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE newsletter (
                id INT AUTO_INCREMENT NOT NULL,
                email VARCHAR(255) NOT NULL,
                subscribed_at DATETIME NOT NULL,
                is_active TINYINT(1) NOT NULL DEFAULT 1,
                UNIQUE INDEX uniq_newsletter_email (email),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);

        // ---------------- testimonial ----------------
        $this->addSql(<<<'SQL'
            CREATE TABLE testimonial (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(255) NOT NULL,
                country VARCHAR(255) NOT NULL,
                rating INT NOT NULL,
                comment_fr LONGTEXT DEFAULT NULL,
                comment_en LONGTEXT DEFAULT NULL,
                comment_ar LONGTEXT DEFAULT NULL,
                comment_it LONGTEXT DEFAULT NULL,
                video_filename VARCHAR(255) DEFAULT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE excursion');
        $this->addSql('DROP TABLE admin_user');
        $this->addSql('DROP TABLE contact_message');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE testimonial');
    }
}