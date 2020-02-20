<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214095425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE housing_help (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reduction_help (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport_help (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE help ADD housing_help_id INT NOT NULL, ADD reduction_help_id INT NOT NULL, ADD transport_help_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC6A0C062F FOREIGN KEY (housing_help_id) REFERENCES housing_help (id)');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC55CBF8AE FOREIGN KEY (reduction_help_id) REFERENCES reduction_help (id)');
        $this->addSql('ALTER TABLE help ADD CONSTRAINT FK_8875CAC4726A516 FOREIGN KEY (transport_help_id) REFERENCES transport_help (id)');
        $this->addSql('CREATE INDEX IDX_8875CAC6A0C062F ON help (housing_help_id)');
        $this->addSql('CREATE INDEX IDX_8875CAC55CBF8AE ON help (reduction_help_id)');
        $this->addSql('CREATE INDEX IDX_8875CAC4726A516 ON help (transport_help_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE help DROP FOREIGN KEY FK_8875CAC6A0C062F');
        $this->addSql('ALTER TABLE help DROP FOREIGN KEY FK_8875CAC55CBF8AE');
        $this->addSql('ALTER TABLE help DROP FOREIGN KEY FK_8875CAC4726A516');
        $this->addSql('DROP TABLE housing_help');
        $this->addSql('DROP TABLE reduction_help');
        $this->addSql('DROP TABLE transport_help');
        $this->addSql('DROP INDEX IDX_8875CAC6A0C062F ON help');
        $this->addSql('DROP INDEX IDX_8875CAC55CBF8AE ON help');
        $this->addSql('DROP INDEX IDX_8875CAC4726A516 ON help');
        $this->addSql('ALTER TABLE help DROP housing_help_id, DROP reduction_help_id, DROP transport_help_id, DROP name, DROP description');
    }
}
