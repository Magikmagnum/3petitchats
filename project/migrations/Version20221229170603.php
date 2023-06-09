<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229170603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, type_pet VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, moditfy_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_produit (category_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_EE7DAC5912469DE2 (category_id), INDEX IDX_EE7DAC59F347EFB (produit_id), PRIMARY KEY(category_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_produit ADD CONSTRAINT FK_EE7DAC5912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_produit ADD CONSTRAINT FK_EE7DAC59F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2744F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2744F5D008 ON produit (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_produit DROP FOREIGN KEY FK_EE7DAC5912469DE2');
        $this->addSql('ALTER TABLE category_produit DROP FOREIGN KEY FK_EE7DAC59F347EFB');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_produit');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2744F5D008');
        $this->addSql('DROP INDEX IDX_29A5EC2744F5D008 ON produit');
        $this->addSql('ALTER TABLE produit DROP brand_id');
    }
}
