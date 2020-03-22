<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321234513 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE afsnit_user');
        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE afsnit_user (afsnit_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B262D614BD94B23C (afsnit_id), INDEX IDX_B262D614A76ED395 (user_id), PRIMARY KEY(afsnit_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614BD94B23C FOREIGN KEY (afsnit_id) REFERENCES afsnit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admission CHANGE discharged discharged DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE afsnit CHANGE afdeling_id afdeling_id INT DEFAULT NULL, CHANGE beds beds LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE notefelter notefelter LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
    }
}
