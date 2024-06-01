<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240601141539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5A18406DE');
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5C6EE5C49');
        $this->addSql('DROP INDEX IDX_A4AF91D5C6EE5C49 ON avoir_handicap');
        $this->addSql('DROP INDEX IDX_A4AF91D5A18406DE ON avoir_handicap');
        $this->addSql('ALTER TABLE avoir_handicap ADD user_id INT NOT NULL, ADD handicap_id INT NOT NULL, DROP id_utilisateur_id, DROP id_handicap_id');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5A76ED395 FOREIGN KEY (user_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5B996CB29 FOREIGN KEY (handicap_id) REFERENCES handicap (id)');
        $this->addSql('CREATE INDEX IDX_A4AF91D5A76ED395 ON avoir_handicap (user_id)');
        $this->addSql('CREATE INDEX IDX_A4AF91D5B996CB29 ON avoir_handicap (handicap_id)');
        $this->addSql('ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_5CA777B8C6EE5C49 ON chauffeur');
        $this->addSql('ALTER TABLE chauffeur CHANGE id_utilisateur_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5CA777B8A76ED395 ON chauffeur (user_id)');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C6EE5C49');
        $this->addSql('DROP INDEX UNIQ_C7440455C6EE5C49 ON client');
        $this->addSql('ALTER TABLE client CHANGE id_utilisateur_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A76ED395 ON client (user_id)');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2A18406DE');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2C6EE5C49');
        $this->addSql('DROP INDEX IDX_CD0D6EA2C6EE5C49 ON gerer_handicap');
        $this->addSql('DROP INDEX IDX_CD0D6EA2A18406DE ON gerer_handicap');
        $this->addSql('ALTER TABLE gerer_handicap ADD user_id INT NOT NULL, ADD handicap_id INT NOT NULL, DROP id_utilisateur_id, DROP id_handicap_id');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2A76ED395 FOREIGN KEY (user_id) REFERENCES chauffeur (id)');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2B996CB29 FOREIGN KEY (handicap_id) REFERENCES handicap (id)');
        $this->addSql('CREATE INDEX IDX_CD0D6EA2A76ED395 ON gerer_handicap (user_id)');
        $this->addSql('CREATE INDEX IDX_CD0D6EA2B996CB29 ON gerer_handicap (handicap_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A601C6CC');
        $this->addSql('DROP INDEX IDX_42C84955A601C6CC ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE id_chauffeur_id chauffeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495585C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_42C8495585C0B3BE ON reservation (chauffeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5A76ED395');
        $this->addSql('ALTER TABLE avoir_handicap DROP FOREIGN KEY FK_A4AF91D5B996CB29');
        $this->addSql('DROP INDEX IDX_A4AF91D5A76ED395 ON avoir_handicap');
        $this->addSql('DROP INDEX IDX_A4AF91D5B996CB29 ON avoir_handicap');
        $this->addSql('ALTER TABLE avoir_handicap ADD id_utilisateur_id INT NOT NULL, ADD id_handicap_id INT NOT NULL, DROP user_id, DROP handicap_id');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5A18406DE FOREIGN KEY (id_handicap_id) REFERENCES handicap (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE avoir_handicap ADD CONSTRAINT FK_A4AF91D5C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A4AF91D5C6EE5C49 ON avoir_handicap (id_utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_A4AF91D5A18406DE ON avoir_handicap (id_handicap_id)');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2A76ED395');
        $this->addSql('ALTER TABLE gerer_handicap DROP FOREIGN KEY FK_CD0D6EA2B996CB29');
        $this->addSql('DROP INDEX IDX_CD0D6EA2A76ED395 ON gerer_handicap');
        $this->addSql('DROP INDEX IDX_CD0D6EA2B996CB29 ON gerer_handicap');
        $this->addSql('ALTER TABLE gerer_handicap ADD id_utilisateur_id INT NOT NULL, ADD id_handicap_id INT NOT NULL, DROP user_id, DROP handicap_id');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2A18406DE FOREIGN KEY (id_handicap_id) REFERENCES handicap (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE gerer_handicap ADD CONSTRAINT FK_CD0D6EA2C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES chauffeur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CD0D6EA2C6EE5C49 ON gerer_handicap (id_utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_CD0D6EA2A18406DE ON gerer_handicap (id_handicap_id)');
        $this->addSql('ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8A76ED395');
        $this->addSql('DROP INDEX UNIQ_5CA777B8A76ED395 ON chauffeur');
        $this->addSql('ALTER TABLE chauffeur CHANGE user_id id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5CA777B8C6EE5C49 ON chauffeur (id_utilisateur_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495585C0B3BE');
        $this->addSql('DROP INDEX IDX_42C8495585C0B3BE ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE chauffeur_id id_chauffeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A601C6CC FOREIGN KEY (id_chauffeur_id) REFERENCES chauffeur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C84955A601C6CC ON reservation (id_chauffeur_id)');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('DROP INDEX UNIQ_C7440455A76ED395 ON client');
        $this->addSql('ALTER TABLE client CHANGE user_id id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455C6EE5C49 ON client (id_utilisateur_id)');
    }
}
