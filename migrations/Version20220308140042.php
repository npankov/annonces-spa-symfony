<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308140042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adopter CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE adopter ADD CONSTRAINT FK_A6ECDA1DBF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE breeder CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE breeder ADD CONSTRAINT FK_73DA3D7ABF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users ADD roles JSON NOT NULL, ADD discr VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE `admin` CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE adopter DROP FOREIGN KEY FK_A6ECDA1DBF396750');
        $this->addSql('ALTER TABLE adopter CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE town town VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE department department VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE first_name first_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE announcement CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE infos infos VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE breeder DROP FOREIGN KEY FK_73DA3D7ABF396750');
        $this->addSql('ALTER TABLE breeder CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE dog CHANGE background background VARCHAR(500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(1500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE text text VARCHAR(8000) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE picture CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('ALTER TABLE users DROP roles, DROP discr, CHANGE email email VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
