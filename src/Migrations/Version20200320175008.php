<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200320175008 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE admisions');
        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admisions (id INT AUTO_INCREMENT NOT NULL, cpr_id INT NOT NULL, sks_id INT NOT NULL, admission DATETIME NOT NULL, active TINYINT(1) NOT NULL, dismissed DATETIME DEFAULT \'NULL\', UNIQUE INDEX UNIQ_B58F949B9E4648AD (cpr_id), UNIQUE INDEX UNIQ_B58F949B321C8BC0 (sks_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admisions ADD CONSTRAINT FK_B58F949B321C8BC0 FOREIGN KEY (sks_id) REFERENCES afsnit (id)');
        $this->addSql('ALTER TABLE admisions ADD CONSTRAINT FK_B58F949B9E4648AD FOREIGN KEY (cpr_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
    }
}
