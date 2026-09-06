<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260902182420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE programme ADD short_description_fr VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD short_description_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD short_description_ar VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD short_description_it VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE programme DROP short_description_fr');
        $this->addSql('ALTER TABLE programme DROP short_description_en');
        $this->addSql('ALTER TABLE programme DROP short_description_ar');
        $this->addSql('ALTER TABLE programme DROP short_description_it');
    }
}
