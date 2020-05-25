<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525202754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actuality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actuality_society (actuality_id INT NOT NULL, society_id INT NOT NULL, INDEX IDX_A5C1B307B84BD854 (actuality_id), INDEX IDX_A5C1B307E6389D24 (society_id), PRIMARY KEY(actuality_id, society_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, postal_code INT NOT NULL, street_number INT NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advantage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advantage_tag (advantage_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6508D1673864498A (advantage_id), INDEX IDX_6508D167BAD26311 (tag_id), PRIMARY KEY(advantage_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE advantage_society (advantage_id INT NOT NULL, society_id INT NOT NULL, INDEX IDX_9E6A6D683864498A (advantage_id), INDEX IDX_9E6A6D68E6389D24 (society_id), PRIMARY KEY(advantage_id, society_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_society (card_id INT NOT NULL, society_id INT NOT NULL, INDEX IDX_5A7EEB844ACC9A20 (card_id), INDEX IDX_5A7EEB84E6389D24 (society_id), PRIMARY KEY(card_id, society_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help_requirement (help_id INT NOT NULL, requirement_id INT NOT NULL, INDEX IDX_35DBE1B4D3F165E7 (help_id), INDEX IDX_35DBE1B47B576F77 (requirement_id), PRIMARY KEY(help_id, requirement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help_tag (help_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_56E059AED3F165E7 (help_id), INDEX IDX_56E059AEBAD26311 (tag_id), PRIMARY KEY(help_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help_society (help_id INT NOT NULL, society_id INT NOT NULL, INDEX IDX_537E9E2ED3F165E7 (help_id), INDEX IDX_537E9E2EE6389D24 (society_id), PRIMARY KEY(help_id, society_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE requirement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, operator VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE society (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, phone INT NOT NULL, name VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, website VARCHAR(150) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D6461F2F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(100) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actuality_society ADD CONSTRAINT FK_A5C1B307B84BD854 FOREIGN KEY (actuality_id) REFERENCES actuality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actuality_society ADD CONSTRAINT FK_A5C1B307E6389D24 FOREIGN KEY (society_id) REFERENCES society (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advantage_tag ADD CONSTRAINT FK_6508D1673864498A FOREIGN KEY (advantage_id) REFERENCES advantage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advantage_tag ADD CONSTRAINT FK_6508D167BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advantage_society ADD CONSTRAINT FK_9E6A6D683864498A FOREIGN KEY (advantage_id) REFERENCES advantage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE advantage_society ADD CONSTRAINT FK_9E6A6D68E6389D24 FOREIGN KEY (society_id) REFERENCES society (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_society ADD CONSTRAINT FK_5A7EEB844ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_society ADD CONSTRAINT FK_5A7EEB84E6389D24 FOREIGN KEY (society_id) REFERENCES society (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_requirement ADD CONSTRAINT FK_35DBE1B4D3F165E7 FOREIGN KEY (help_id) REFERENCES help (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_requirement ADD CONSTRAINT FK_35DBE1B47B576F77 FOREIGN KEY (requirement_id) REFERENCES requirement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_tag ADD CONSTRAINT FK_56E059AED3F165E7 FOREIGN KEY (help_id) REFERENCES help (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_tag ADD CONSTRAINT FK_56E059AEBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_society ADD CONSTRAINT FK_537E9E2ED3F165E7 FOREIGN KEY (help_id) REFERENCES help (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE help_society ADD CONSTRAINT FK_537E9E2EE6389D24 FOREIGN KEY (society_id) REFERENCES society (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE society ADD CONSTRAINT FK_D6461F2F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actuality_society DROP FOREIGN KEY FK_A5C1B307B84BD854');
        $this->addSql('ALTER TABLE society DROP FOREIGN KEY FK_D6461F2F5B7AF75');
        $this->addSql('ALTER TABLE advantage_tag DROP FOREIGN KEY FK_6508D1673864498A');
        $this->addSql('ALTER TABLE advantage_society DROP FOREIGN KEY FK_9E6A6D683864498A');
        $this->addSql('ALTER TABLE card_society DROP FOREIGN KEY FK_5A7EEB844ACC9A20');
        $this->addSql('ALTER TABLE help_requirement DROP FOREIGN KEY FK_35DBE1B4D3F165E7');
        $this->addSql('ALTER TABLE help_tag DROP FOREIGN KEY FK_56E059AED3F165E7');
        $this->addSql('ALTER TABLE help_society DROP FOREIGN KEY FK_537E9E2ED3F165E7');
        $this->addSql('ALTER TABLE help_requirement DROP FOREIGN KEY FK_35DBE1B47B576F77');
        $this->addSql('ALTER TABLE actuality_society DROP FOREIGN KEY FK_A5C1B307E6389D24');
        $this->addSql('ALTER TABLE advantage_society DROP FOREIGN KEY FK_9E6A6D68E6389D24');
        $this->addSql('ALTER TABLE card_society DROP FOREIGN KEY FK_5A7EEB84E6389D24');
        $this->addSql('ALTER TABLE help_society DROP FOREIGN KEY FK_537E9E2EE6389D24');
        $this->addSql('ALTER TABLE advantage_tag DROP FOREIGN KEY FK_6508D167BAD26311');
        $this->addSql('ALTER TABLE help_tag DROP FOREIGN KEY FK_56E059AEBAD26311');
        $this->addSql('DROP TABLE actuality');
        $this->addSql('DROP TABLE actuality_society');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE advantage');
        $this->addSql('DROP TABLE advantage_tag');
        $this->addSql('DROP TABLE advantage_society');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE card_society');
        $this->addSql('DROP TABLE help');
        $this->addSql('DROP TABLE help_requirement');
        $this->addSql('DROP TABLE help_tag');
        $this->addSql('DROP TABLE help_society');
        $this->addSql('DROP TABLE requirement');
        $this->addSql('DROP TABLE society');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
