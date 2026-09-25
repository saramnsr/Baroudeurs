<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Circuit : dates de création, modification et suppression (corbeille).
 */
final class Version20260925100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Circuit : ajout de created_at, updated_at et deleted_at (corbeille).';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE circuit ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE circuit ADD deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql("COMMENT ON COLUMN circuit.created_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql("COMMENT ON COLUMN circuit.updated_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql("COMMENT ON COLUMN circuit.deleted_at IS '(DC2Type:datetime_immutable)'");

        // Lignes existantes : date = maintenant
        $this->addSql('UPDATE circuit SET created_at = NOW(), updated_at = NOW() WHERE created_at IS NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE circuit DROP created_at');
        $this->addSql('ALTER TABLE circuit DROP updated_at');
        $this->addSql('ALTER TABLE circuit DROP deleted_at');
    }
}