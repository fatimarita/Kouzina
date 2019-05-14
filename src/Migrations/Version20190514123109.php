<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514123109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, recette_categories_id INT NOT NULL, type_categories VARCHAR(255) NOT NULL, INDEX IDX_3AF34668F3C3EB07 (recette_categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, stars SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, comment_recette_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, nb_views INT NOT NULL, image_src VARCHAR(255) DEFAULT NULL, image_alt VARCHAR(255) DEFAULT NULL, liks INT NOT NULL, INDEX IDX_49BB6390BD0A5C9 (comment_recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, comment_user_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(64) NOT NULL, password VARCHAR(10) NOT NULL, is_enabled TINYINT(1) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_8D93D64989312FE9 (recette_id), INDEX IDX_8D93D649541DB185 (comment_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668F3C3EB07 FOREIGN KEY (recette_categories_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390BD0A5C9 FOREIGN KEY (comment_recette_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649541DB185 FOREIGN KEY (comment_user_id) REFERENCES comment (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390BD0A5C9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649541DB185');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668F3C3EB07');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989312FE9');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE user');
    }
}
