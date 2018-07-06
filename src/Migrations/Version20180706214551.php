<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180706214551 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE afsnit (id INT AUTO_INCREMENT NOT NULL, afdeling_id INT NOT NULL, sks VARCHAR(7) NOT NULL, navn VARCHAR(64) NOT NULL, oprettet DATE NOT NULL, INDEX IDX_BC8C7322C5BE90E3 (afdeling_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE afsnit_user (afsnit_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B262D614BD94B23C (afsnit_id), INDEX IDX_B262D614A76ED395 (user_id), PRIMARY KEY(afsnit_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE afsnit ADD CONSTRAINT FK_BC8C7322C5BE90E3 FOREIGN KEY (afdeling_id) REFERENCES afdeling (id)');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614BD94B23C FOREIGN KEY (afsnit_id) REFERENCES afsnit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE afsnit_user ADD CONSTRAINT FK_B262D614A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE afdeling ADD area VARCHAR(64) NOT NULL, ADD oprettet DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE afsnit_user DROP FOREIGN KEY FK_B262D614BD94B23C');
        $this->addSql('DROP TABLE afsnit');
        $this->addSql('DROP TABLE afsnit_user');
        $this->addSql('ALTER TABLE afdeling DROP area, DROP oprettet');
    }
}
