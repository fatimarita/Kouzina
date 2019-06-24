<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620141301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recette CHANGE ingredients ingredients LONGTEXT NOT NULL, CHANGE preparation preparation LONGTEXT NOT NULL, CHANGE cuisson cuisson LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE enabled enabled TINYINT(1) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE is_enabled is_enabled TINYINT(1) NOT NULL, CHANGE role role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user CHANGE username_canonical username_canonical VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE enabled enabled TINYINT(1) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE roles roles LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE is_enabled is_enabled TINYINT(1) DEFAULT NULL, CHANGE role role VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE recette CHANGE ingredients ingredients VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE preparation preparation VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE cuisson cuisson VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
