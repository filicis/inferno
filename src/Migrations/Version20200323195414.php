<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200323195414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE afsnit CHANGE beds beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE noter ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE noter ADD CONSTRAINT FK_761C961A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_761C961A6B899279 ON noter (patient_id)');
        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT NULL, CHANGE bed bed VARCHAR(8) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT \'NULL\', CHANGE bed bed VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE afsnit CHANGE beds beds LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE noter DROP FOREIGN KEY FK_761C961A6B899279');
        $this->addSql('DROP INDEX IDX_761C961A6B899279 ON noter');
        $this->addSql('ALTER TABLE noter DROP patient_id');
    }
}
