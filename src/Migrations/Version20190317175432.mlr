<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190317175432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, cpr VARCHAR(10) NOT NULL, efternavn VARCHAR(50) NOT NULL, fornavne VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skstable (id INT AUTO_INCREMENT NOT NULL, sks VARCHAR(10) NOT NULL, tekst VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hospital (id INT AUTO_INCREMENT NOT NULL, sks_id INT NOT NULL, UNIQUE INDEX UNIQ_4282C85B321C8BC0 (sks_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noter (id INT AUTO_INCREMENT NOT NULL, forfatter VARCHAR(6) NOT NULL, skrevet DATETIME NOT NULL, tekst LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', patient INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hospital ADD CONSTRAINT FK_4282C85B321C8BC0 FOREIGN KEY (sks_id) REFERENCES skstable (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospital DROP FOREIGN KEY FK_4282C85B321C8BC0');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE skstable');
        $this->addSql('DROP TABLE hospital');
        $this->addSql('DROP TABLE noter');
    }
}
