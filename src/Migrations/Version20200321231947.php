<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321231947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, cpr VARCHAR(10) NOT NULL, efternavn VARCHAR(50) NOT NULL, fornavne VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EB24E4C58D (cpr), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skstable (sks VARCHAR(10) NOT NULL, tekst VARCHAR(60) NOT NULL, PRIMARY KEY(sks)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hospital (sks VARCHAR(10) NOT NULL, navn VARCHAR(60) NOT NULL, PRIMARY KEY(sks)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, navn VARCHAR(64) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, oprettet DATE NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE afsnit (id INT AUTO_INCREMENT NOT NULL, afdeling_id INT DEFAULT NULL, sks VARCHAR(7) NOT NULL, navn VARCHAR(64) NOT NULL, oprettet DATE NOT NULL, beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', kortnavn VARCHAR(8) NOT NULL, UNIQUE INDEX UNIQ_BC8C7322E6F39DF1 (sks), INDEX IDX_BC8C7322C5BE90E3 (afdeling_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE afsnit_user (afsnit_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B262D614BD94B23C (afsnit_id), INDEX IDX_B262D614A76ED395 (user_id), PRIMARY KEY(afsnit_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE afdeling (id INT AUTO_INCREMENT NOT NULL, sks VARCHAR(9) NOT NULL, navn VARCHAR(64) NOT NULL, is_active TINYINT(1) NOT NULL, area VARCHAR(64) NOT NULL, oprettet DATE NOT NULL, institution VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noter (id INT AUTO_INCREMENT NOT NULL, forfatter VARCHAR(6) NOT NULL, skrevet DATETIME NOT NULL, tekst LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', patient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admission (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, afsnit_id INT NOT NULL, user_id INT NOT NULL, active TINYINT(1) NOT NULL, discharged DATETIME DEFAULT NULL, admitted DATETIME NOT NULL, INDEX IDX_F4BB024A6B899279 (patient_id), INDEX IDX_F4BB024ABD94B23C (afsnit_id), INDEX IDX_F4BB024AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE afsnit ADD CONSTRAINT FK_BC8C7322C5BE90E3 FOREIGN KEY (afdeling_id) REFERENCES afdeling (id)');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614BD94B23C FOREIGN KEY (afsnit_id) REFERENCES afsnit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024ABD94B23C FOREIGN KEY (afsnit_id) REFERENCES afsnit (id)');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024A6B899279');
        $this->addSql('ALTER TABLE afsnit_user DROP FOREIGN KEY FK_B262D614A76ED395');
        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024AA76ED395');
        $this->addSql('ALTER TABLE afsnit_user DROP FOREIGN KEY FK_B262D614BD94B23C');
        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024ABD94B23C');
        $this->addSql('ALTER TABLE afsnit DROP FOREIGN KEY FK_BC8C7322C5BE90E3');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE skstable');
        $this->addSql('DROP TABLE hospital');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE afsnit');
        $this->addSql('DROP TABLE afsnit_user');
        $this->addSql('DROP TABLE afdeling');
        $this->addSql('DROP TABLE noter');
        $this->addSql('DROP TABLE admission');
    }
}
