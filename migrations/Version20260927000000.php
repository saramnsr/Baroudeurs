<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260927000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création contact_message + view_count sur circuit et excursion.';
    }

    public function up(Schema $schema): void
    {
        // Contact messages
        $this->addSql('CREATE TABLE contact_message (
            id SERIAL NOT NULL,
            type VARCHAR(32) NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(255) DEFAULT NULL,
            message TEXT DEFAULT NULL,
            extra JSON DEFAULT NULL,
            is_read BOOLEAN NOT NULL DEFAULT FALSE,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            PRIMARY KEY(id)
        )');
        $this->addSql("COMMENT ON COLUMN contact_message.created_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql('CREATE INDEX idx_contact_message_type ON contact_message (type)');
        $this->addSql('CREATE INDEX idx_contact_message_created ON contact_message (created_at DESC)');

        // View count on circuit and excursion
        $this->addSql('ALTER TABLE circuit ADD view_count INTEGER NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE excursion ADD view_count INTEGER NOT NULL DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE contact_message');
        $this->addSql('ALTER TABLE circuit DROP view_count');
        $this->addSql('ALTER TABLE excursion DROP view_count');
    }
}