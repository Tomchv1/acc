<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118142920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, traite_par VARCHAR(50) DEFAULT NULL, date VARCHAR(15) DEFAULT NULL, assurance VARCHAR(6) NOT NULL, statut_ri VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent ADD inscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0605DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F0605DAC5993 ON adherent (inscription_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F0605DAC5993');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP INDEX UNIQ_90D3F0605DAC5993 ON adherent');
        $this->addSql('ALTER TABLE adherent DROP inscription_id');
    }
}
