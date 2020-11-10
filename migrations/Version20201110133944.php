<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110133944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE nom noms VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE couleur couleur LONGTEXT NOT NULL, CHANGE date_debut date_debut DATETIME NOT NULL, CHANGE calibre calibre DOUBLE PRECISION NOT NULL, CHANGE ecart ecart DOUBLE PRECISION NOT NULL, CHANGE hauteur hauteur DOUBLE PRECISION NOT NULL, CHANGE code_produit code_produit VARCHAR(20) NOT NULL, CHANGE code_couleur code_couleur VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE noms nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit CHANGE couleur couleur LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_debut date_debut DATETIME DEFAULT NULL, CHANGE calibre calibre DOUBLE PRECISION DEFAULT NULL, CHANGE ecart ecart DOUBLE PRECISION DEFAULT NULL, CHANGE hauteur hauteur DOUBLE PRECISION DEFAULT NULL, CHANGE code_produit code_produit VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_couleur code_couleur VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
