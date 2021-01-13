<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113104534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activites (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, age_min INT DEFAULT NULL, age_max INT DEFAULT NULL, tarif_cours DOUBLE PRECISION DEFAULT NULL, tarif_hors_cours DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activites_adherent (activites_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_A88627E55B8C31B7 (activites_id), INDEX IDX_A88627E525F06C53 (adherent_id), PRIMARY KEY(activites_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, adhesion_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_naissance VARCHAR(20) NOT NULL, INDEX IDX_90D3F06097A77B84 (famille_id), UNIQUE INDEX UNIQ_90D3F060F68139D7 (adhesion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adhesion (id INT AUTO_INCREMENT NOT NULL, annee_id INT DEFAULT NULL, montant_a_regler DOUBLE PRECISION NOT NULL, montant_regle DOUBLE PRECISION NOT NULL, banque VARCHAR(60) DEFAULT NULL, INDEX IDX_C50CA65A543EC5F0 (annee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annee (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(70) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, activites_id INT DEFAULT NULL, jour VARCHAR(15) DEFAULT NULL, date_debut VARCHAR(20) DEFAULT NULL, date_fin VARCHAR(20) DEFAULT NULL, INDEX IDX_BBC83DB65B8C31B7 (activites_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) NOT NULL, mensualite INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement_adhesion (paiement_id INT NOT NULL, adhesion_id INT NOT NULL, INDEX IDX_FAB5E602A4C4478 (paiement_id), INDEX IDX_FAB5E60F68139D7 (adhesion_id), PRIMARY KEY(paiement_id, adhesion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(20) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, telephone VARCHAR(10) DEFAULT NULL, portable VARCHAR(10) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, adresse VARCHAR(150) NOT NULL, ville VARCHAR(100) DEFAULT NULL, cp VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable_adherent (responsable_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_B47B9C7A53C59D72 (responsable_id), INDEX IDX_B47B9C7A25F06C53 (adherent_id), PRIMARY KEY(responsable_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activites_adherent ADD CONSTRAINT FK_A88627E55B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites_adherent ADD CONSTRAINT FK_A88627E525F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F06097A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060F68139D7 FOREIGN KEY (adhesion_id) REFERENCES adhesion (id)');
        $this->addSql('ALTER TABLE adhesion ADD CONSTRAINT FK_C50CA65A543EC5F0 FOREIGN KEY (annee_id) REFERENCES annee (id)');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB65B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id)');
        $this->addSql('ALTER TABLE paiement_adhesion ADD CONSTRAINT FK_FAB5E602A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paiement_adhesion ADD CONSTRAINT FK_FAB5E60F68139D7 FOREIGN KEY (adhesion_id) REFERENCES adhesion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable_adherent ADD CONSTRAINT FK_B47B9C7A53C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable_adherent ADD CONSTRAINT FK_B47B9C7A25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites_adherent DROP FOREIGN KEY FK_A88627E55B8C31B7');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB65B8C31B7');
        $this->addSql('ALTER TABLE activites_adherent DROP FOREIGN KEY FK_A88627E525F06C53');
        $this->addSql('ALTER TABLE responsable_adherent DROP FOREIGN KEY FK_B47B9C7A25F06C53');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060F68139D7');
        $this->addSql('ALTER TABLE paiement_adhesion DROP FOREIGN KEY FK_FAB5E60F68139D7');
        $this->addSql('ALTER TABLE adhesion DROP FOREIGN KEY FK_C50CA65A543EC5F0');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F06097A77B84');
        $this->addSql('ALTER TABLE paiement_adhesion DROP FOREIGN KEY FK_FAB5E602A4C4478');
        $this->addSql('ALTER TABLE responsable_adherent DROP FOREIGN KEY FK_B47B9C7A53C59D72');
        $this->addSql('DROP TABLE activites');
        $this->addSql('DROP TABLE activites_adherent');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE adhesion');
        $this->addSql('DROP TABLE annee');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE paiement_adhesion');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE responsable_adherent');
    }
}
