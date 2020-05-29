<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529091630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE outils (id INT AUTO_INCREMENT NOT NULL, nom_outil VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outils_user (outils_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D14BC36AF7E699 (outils_id), INDEX IDX_D14BC36A76ED395 (user_id), PRIMARY KEY(outils_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outils_user ADD CONSTRAINT FK_D14BC36AF7E699 FOREIGN KEY (outils_id) REFERENCES outils (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outils_user ADD CONSTRAINT FK_D14BC36A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE outils_user DROP FOREIGN KEY FK_D14BC36AF7E699');
        $this->addSql('DROP TABLE outils');
        $this->addSql('DROP TABLE outils_user');
    }
}
