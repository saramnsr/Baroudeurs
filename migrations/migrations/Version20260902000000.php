<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260902000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add price field to programme table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE programme ADD price VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE programme DROP price');
    }
}