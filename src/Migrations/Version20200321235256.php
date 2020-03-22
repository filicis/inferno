<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321235256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE afsnit DROP FOREIGN KEY FK_BC8C7322C5BE90E3');
        $this->addSql('DROP INDEX IDX_BC8C7322C5BE90E3 ON afsnit');
        $this->addSql('ALTER TABLE afsnit DROP afdeling_id, CHANGE beds beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE afsnit ADD afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE afsnit ADD CONSTRAINT FK_BC8C7322C5BE90E3 FOREIGN KEY (afdeling_id) REFERENCES afdeling (id)');
        $this->addSql('CREATE INDEX IDX_BC8C7322C5BE90E3 ON afsnit (afdeling_id)');
    }
}
