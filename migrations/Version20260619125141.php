<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619125141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE programme ADD title_fr VARCHAR(255) NOT NULL, ADD title_ar VARCHAR(255) NOT NULL, ADD title_en VARCHAR(255) NOT NULL, ADD title_it VARCHAR(255) NOT NULL, ADD description_fr TEXT NOT NULL, ADD description_en TEXT NOT NULL, ADD description_ar TEXT NOT NULL, ADD description_it TEXT NOT NULL, ADD duree_fr VARCHAR(100) NOT NULL, ADD duree_en VARCHAR(100) NOT NULL, ADD duree_ar VARCHAR(100) NOT NULL, ADD duree_it VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE programme DROP title_fr, DROP title_ar, DROP title_en, DROP title_it, DROP description_fr, DROP description_en, DROP description_ar, DROP description_it, DROP duree_fr, DROP duree_en, DROP duree_ar, DROP duree_it');
    }
}
