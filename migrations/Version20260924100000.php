<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * [ADMIN] Création de la table admin_user.
 */
final class Version20260924100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '[ADMIN] Création de la table admin_user.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE admin_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE admin_user (
            id INT NOT NULL,
            email VARCHAR(180) NOT NULL,
            roles JSON NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            last_login_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id)
        )');
        $this->addSql('CREATE UNIQUE INDEX uniq_admin_user_email ON admin_user (email)');
        $this->addSql("COMMENT ON COLUMN admin_user.created_at IS '(DC2Type:datetime_immutable)'");
        $this->addSql("COMMENT ON COLUMN admin_user.last_login_at IS '(DC2Type:datetime_immutable)'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE admin_user_id_seq CASCADE');
        $this->addSql('DROP TABLE admin_user');
    }
}