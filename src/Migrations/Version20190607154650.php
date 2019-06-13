<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607154650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668F3C3EB07');
        $this->addSql('DROP INDEX IDX_3AF34668F3C3EB07 ON categories');
        $this->addSql('ALTER TABLE categories DROP recette_categories_id');
        $this->addSql('ALTER TABLE recette ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639012469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_49BB639012469DE2 ON recette (category_id)');
        $this->addSql('ALTER TABLE fos_user CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE is_enabled is_enabled TINYINT(1) NOT NULL, CHANGE role role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categories ADD recette_categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668F3C3EB07 FOREIGN KEY (recette_categories_id) REFERENCES recette (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668F3C3EB07 ON categories (recette_categories_id)');
        $this->addSql('ALTER TABLE fos_user CHANGE username_canonical username_canonical VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE is_enabled is_enabled TINYINT(1) DEFAULT NULL, CHANGE role role VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB639012469DE2');
        $this->addSql('DROP INDEX IDX_49BB639012469DE2 ON recette');
        $this->addSql('ALTER TABLE recette DROP category_id');
    }
}
