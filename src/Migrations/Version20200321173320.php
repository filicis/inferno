<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321173320 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024A321C8BC0');
        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024A9E4648AD');
        $this->addSql('DROP INDEX UNIQ_F4BB024A9E4648AD ON admission');
        $this->addSql('DROP INDEX UNIQ_F4BB024A321C8BC0 ON admission');
        $this->addSql('ALTER TABLE admission ADD patient_id INT NOT NULL, ADD afsnit_id INT NOT NULL, DROP cpr_id, DROP sks_id, CHANGE discharged discharged DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024ABD94B23C FOREIGN KEY (afsnit_id) REFERENCES afsnit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4BB024A6B899279 ON admission (patient_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4BB024ABD94B23C ON admission (afsnit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024A6B899279');
        $this->addSql('ALTER TABLE admission DROP FOREIGN KEY FK_F4BB024ABD94B23C');
        $this->addSql('DROP INDEX UNIQ_F4BB024A6B899279 ON admission');
        $this->addSql('DROP INDEX UNIQ_F4BB024ABD94B23C ON admission');
        $this->addSql('ALTER TABLE admission ADD cpr_id INT NOT NULL, ADD sks_id INT NOT NULL, DROP patient_id, DROP afsnit_id, CHANGE discharged discharged DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024A321C8BC0 FOREIGN KEY (sks_id) REFERENCES afsnit (id)');
        $this->addSql('ALTER TABLE admission ADD CONSTRAINT FK_F4BB024A9E4648AD FOREIGN KEY (cpr_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4BB024A9E4648AD ON admission (cpr_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F4BB024A321C8BC0 ON admission (sks_id)');
        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
    }
}
