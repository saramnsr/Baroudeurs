<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Excursion : ajout de created_at, updated_at et deleted_at (corbeille).
 */
final class Version20260926000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Excursion : ajout de created_at, updated_at et deleted_at (corbeille).';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE excursion ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE excursion ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE excursion ADD deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql("COMMENT ON COLUMN excursion.created_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql("COMMENT ON COLUMN excursion.updated_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql("COMMENT ON COLUMN excursion.deleted_at IS '(DC2Type:datetime_immutable)'");

        // Lignes existantes : date = maintenant
        $this->addSql('UPDATE excursion SET created_at = NOW(), updated_at = NOW() WHERE created_at IS NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE excursion DROP created_at');
        $this->addSql('ALTER TABLE excursion DROP updated_at');
        $this->addSql('ALTER TABLE excursion DROP deleted_at');
    }
}