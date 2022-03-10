<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309130537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dog ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE message ADD relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3256915B FOREIGN KEY (relation_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F3256915B ON message (relation_id)');
        $this->addSql('ALTER TABLE picture ADD dog_id INT NOT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F89634DFEB ON picture (dog_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adopter CHANGE town town VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE department department VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE first_name first_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE announcement CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE infos infos VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE breeder CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE dog DROP name, CHANGE background background VARCHAR(500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(1500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3256915B');
        $this->addSql('DROP INDEX IDX_B6BD307F3256915B ON message');
        $this->addSql('ALTER TABLE message DROP relation_id, CHANGE text text VARCHAR(8000) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89634DFEB');
        $this->addSql('DROP INDEX IDX_16DB4F89634DFEB ON picture');
        $this->addSql('ALTER TABLE picture DROP dog_id, CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE discr discr VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
