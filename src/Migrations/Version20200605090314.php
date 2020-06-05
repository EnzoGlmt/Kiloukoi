<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200605090314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_outils (categories_id INT NOT NULL, outils_id INT NOT NULL, INDEX IDX_D2248EE2A21214B7 (categories_id), INDEX IDX_D2248EE2AF7E699 (outils_id), PRIMARY KEY(categories_id, outils_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_D9BEC0C4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outils (id INT AUTO_INCREMENT NOT NULL, outil VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outils_user (outils_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D14BC36AF7E699 (outils_id), INDEX IDX_D14BC36A76ED395 (user_id), PRIMARY KEY(outils_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_outils ADD CONSTRAINT FK_D2248EE2A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_outils ADD CONSTRAINT FK_D2248EE2AF7E699 FOREIGN KEY (outils_id) REFERENCES outils (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE outils_user ADD CONSTRAINT FK_D14BC36AF7E699 FOREIGN KEY (outils_id) REFERENCES outils (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outils_user ADD CONSTRAINT FK_D14BC36A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categories_outils DROP FOREIGN KEY FK_D2248EE2A21214B7');
        $this->addSql('ALTER TABLE categories_outils DROP FOREIGN KEY FK_D2248EE2AF7E699');
        $this->addSql('ALTER TABLE outils_user DROP FOREIGN KEY FK_D14BC36AF7E699');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4A76ED395');
        $this->addSql('ALTER TABLE outils_user DROP FOREIGN KEY FK_D14BC36A76ED395');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_outils');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE outils');
        $this->addSql('DROP TABLE outils_user');
        $this->addSql('DROP TABLE user');
    }
}
