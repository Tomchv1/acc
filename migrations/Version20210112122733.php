<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112122733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activites_adherent (activites_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_A88627E55B8C31B7 (activites_id), INDEX IDX_A88627E525F06C53 (adherent_id), PRIMARY KEY(activites_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement_adhesion (paiement_id INT NOT NULL, adhesion_id INT NOT NULL, INDEX IDX_FAB5E602A4C4478 (paiement_id), INDEX IDX_FAB5E60F68139D7 (adhesion_id), PRIMARY KEY(paiement_id, adhesion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable_adherent (responsable_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_B47B9C7A53C59D72 (responsable_id), INDEX IDX_B47B9C7A25F06C53 (adherent_id), PRIMARY KEY(responsable_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activites_adherent ADD CONSTRAINT FK_A88627E55B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites_adherent ADD CONSTRAINT FK_A88627E525F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paiement_adhesion ADD CONSTRAINT FK_FAB5E602A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paiement_adhesion ADD CONSTRAINT FK_FAB5E60F68139D7 FOREIGN KEY (adhesion_id) REFERENCES adhesion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable_adherent ADD CONSTRAINT FK_B47B9C7A53C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable_adherent ADD CONSTRAINT FK_B47B9C7A25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adhesion ADD adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adhesion ADD CONSTRAINT FK_C50CA65A25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('CREATE INDEX IDX_C50CA65A25F06C53 ON adhesion (adherent_id)');
        $this->addSql('ALTER TABLE horaire ADD activites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB65B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id)');
        $this->addSql('CREATE INDEX IDX_BBC83DB65B8C31B7 ON horaire (activites_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE activites_adherent');
        $this->addSql('DROP TABLE paiement_adhesion');
        $this->addSql('DROP TABLE responsable_adherent');
        $this->addSql('ALTER TABLE adhesion DROP FOREIGN KEY FK_C50CA65A25F06C53');
        $this->addSql('DROP INDEX IDX_C50CA65A25F06C53 ON adhesion');
        $this->addSql('ALTER TABLE adhesion DROP adherent_id');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB65B8C31B7');
        $this->addSql('DROP INDEX IDX_BBC83DB65B8C31B7 ON horaire');
        $this->addSql('ALTER TABLE horaire DROP activites_id');
    }
}
