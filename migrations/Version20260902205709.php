<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260902205709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE programme ADD included_fr TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD included_en TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD included_ar TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD included_it TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD excluded_fr TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD excluded_en TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD excluded_ar TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD excluded_it TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE programme ADD images JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE programme DROP included_fr');
        $this->addSql('ALTER TABLE programme DROP included_en');
        $this->addSql('ALTER TABLE programme DROP included_ar');
        $this->addSql('ALTER TABLE programme DROP included_it');
        $this->addSql('ALTER TABLE programme DROP excluded_fr');
        $this->addSql('ALTER TABLE programme DROP excluded_en');
        $this->addSql('ALTER TABLE programme DROP excluded_ar');
        $this->addSql('ALTER TABLE programme DROP excluded_it');
        $this->addSql('ALTER TABLE programme DROP images');
    }
}
