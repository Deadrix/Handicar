<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240601131044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avoir_handicap (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_handicap_id INT NOT NULL, INDEX IDX_A4AF91D5C6EE5C49 (id_utilisateur_id), INDEX IDX_A4AF91D5A18406DE (id_handicap_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chauffeur (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, carte_grise VARCHAR(255) NOT NULL, permis_de_conduire VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5CA777B8C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerer_handicap (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_handicap_id INT NOT NULL, INDEX IDX_CD0D6EA2C6EE5C49 (id_utilisateur_id), INDEX IDX_CD0D6EA2A18406DE (id_handicap_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handicap (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, depart VARCHAR(255) NOT NULL, arrivee VARCHAR(255) NOT NULL, arrets LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', nombre_place INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_chauffeur_id INT NOT NULL, heure_depart DATETIME NOT NULL, heure_arrivee DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_42C84955A601C6CC (id_chauffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_client (reservation_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_8FB54DCEB83297E7 (reservation_id), INDEX IDX_8FB54DCE19EB6921 (client_id), PRIMARY KEY(reservation_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, biographie VARCHAR(255) DEFAULT NULL, carte_identite VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5A18406DE FOREIGN KEY (id_handicap_id) REFERENCES handicap (id)');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES chauffeur (id)');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2A18406DE FOREIGN KEY (id_handicap_id) REFERENCES handicap (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A601C6CC FOREIGN KEY (id_chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('ALTER TABLE reservation_client ADD CONSTRAINT FK_8FB54DCEB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_client ADD CONSTRAINT FK_8FB54DCE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5C6EE5C49');
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5A18406DE');
        $this->addSql('ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8C6EE5C49');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C6EE5C49');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2C6EE5C49');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2A18406DE');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A601C6CC');
        $this->addSql('ALTER TABLE reservation_client DROP FOREIGN KEY FK_8FB54DCEB83297E7');
        $this->addSql('ALTER TABLE reservation_client DROP FOREIGN KEY FK_8FB54DCE19EB6921');
        $this->addSql('DROP TABLE avoir_handicap');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE gerer_handicap');
        $this->addSql('DROP TABLE handicap');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_client');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
