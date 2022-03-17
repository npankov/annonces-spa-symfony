<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317125840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adopter (id INT NOT NULL, town VARCHAR(50) DEFAULT NULL, department VARCHAR(50) DEFAULT NULL, first_name VARCHAR(50) DEFAULT NULL, mail VARCHAR(50) DEFAULT NULL, phone VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announcement (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, request_id INT DEFAULT NULL, title VARCHAR(50) DEFAULT NULL, infos LONGTEXT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, date_announcement DATE DEFAULT NULL, INDEX IDX_4DB9D91C67B3B43D (users_id), INDEX IDX_4DB9D91C427EB8A5 (request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE breeder (id INT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, announcement_id INT NOT NULL, background VARCHAR(500) DEFAULT NULL, description VARCHAR(1500) DEFAULT NULL, is_tolerant TINYINT(1) DEFAULT NULL, is_lof TINYINT(1) DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_812C397D913AEA17 (announcement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog_race (dog_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_18E44E6F634DFEB (dog_id), INDEX IDX_18E44E6F6E59D40D (race_id), PRIMARY KEY(dog_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, announcement_id INT NOT NULL, user_id INT NOT NULL, date_message DATE DEFAULT NULL, text VARCHAR(8000) DEFAULT NULL, INDEX IDX_B6BD307F913AEA17 (announcement_id), INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, dog_id INT NOT NULL, title VARCHAR(50) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, INDEX IDX_16DB4F89634DFEB (dog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_users (request_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_499419CC427EB8A5 (request_id), INDEX IDX_499419CC67B3B43D (users_id), PRIMARY KEY(request_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_dog (request_id INT NOT NULL, dog_id INT NOT NULL, INDEX IDX_4C067831427EB8A5 (request_id), INDEX IDX_4C067831634DFEB (dog_id), PRIMARY KEY(request_id, dog_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adopter ADD CONSTRAINT FK_A6ECDA1DBF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id)');
        $this->addSql('ALTER TABLE breeder ADD CONSTRAINT FK_73DA3D7ABF396750 FOREIGN KEY (id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397D913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id)');
        $this->addSql('ALTER TABLE dog_race ADD CONSTRAINT FK_18E44E6F634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog_race ADD CONSTRAINT FK_18E44E6F6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('ALTER TABLE request_users ADD CONSTRAINT FK_499419CC427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_users ADD CONSTRAINT FK_499419CC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_dog ADD CONSTRAINT FK_4C067831427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_dog ADD CONSTRAINT FK_4C067831634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397D913AEA17');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F913AEA17');
        $this->addSql('ALTER TABLE dog_race DROP FOREIGN KEY FK_18E44E6F634DFEB');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89634DFEB');
        $this->addSql('ALTER TABLE request_dog DROP FOREIGN KEY FK_4C067831634DFEB');
        $this->addSql('ALTER TABLE dog_race DROP FOREIGN KEY FK_18E44E6F6E59D40D');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C427EB8A5');
        $this->addSql('ALTER TABLE request_users DROP FOREIGN KEY FK_499419CC427EB8A5');
        $this->addSql('ALTER TABLE request_dog DROP FOREIGN KEY FK_4C067831427EB8A5');
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE adopter DROP FOREIGN KEY FK_A6ECDA1DBF396750');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C67B3B43D');
        $this->addSql('ALTER TABLE breeder DROP FOREIGN KEY FK_73DA3D7ABF396750');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE request_users DROP FOREIGN KEY FK_499419CC67B3B43D');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE adopter');
        $this->addSql('DROP TABLE announcement');
        $this->addSql('DROP TABLE breeder');
        $this->addSql('DROP TABLE dog');
        $this->addSql('DROP TABLE dog_race');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE request_users');
        $this->addSql('DROP TABLE request_dog');
        $this->addSql('DROP TABLE users');
    }
}
