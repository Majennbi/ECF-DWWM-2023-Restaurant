<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230209234104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opening_hours (id INT AUTO_INCREMENT NOT NULL, start_hour DATETIME DEFAULT NULL, end_hour DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD opening_hours_id INT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDECE298D68 FOREIGN KEY (opening_hours_id) REFERENCES opening_hours (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDECE298D68 ON booking (opening_hours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDECE298D68');
        $this->addSql('DROP TABLE opening_hours');
        $this->addSql('DROP INDEX IDX_E00CEDDECE298D68 ON booking');
        $this->addSql('ALTER TABLE booking DROP opening_hours_id');
    }
}
