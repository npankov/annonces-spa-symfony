<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220316110534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dog_race (dog_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_18E44E6F634DFEB (dog_id), INDEX IDX_18E44E6F6E59D40D (race_id), PRIMARY KEY(dog_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_users (request_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_499419CC427EB8A5 (request_id), INDEX IDX_499419CC67B3B43D (users_id), PRIMARY KEY(request_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_dog (request_id INT NOT NULL, dog_id INT NOT NULL, INDEX IDX_4C067831427EB8A5 (request_id), INDEX IDX_4C067831634DFEB (dog_id), PRIMARY KEY(request_id, dog_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dog_race ADD CONSTRAINT FK_18E44E6F634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog_race ADD CONSTRAINT FK_18E44E6F6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_users ADD CONSTRAINT FK_499419CC427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_users ADD CONSTRAINT FK_499419CC67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_dog ADD CONSTRAINT FK_4C067831427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_dog ADD CONSTRAINT FK_4C067831634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announcement ADD users_id INT NOT NULL, ADD request_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE announcement ADD CONSTRAINT FK_4DB9D91C427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id)');
        $this->addSql('CREATE INDEX IDX_4DB9D91C67B3B43D ON announcement (users_id)');
        $this->addSql('CREATE INDEX IDX_4DB9D91C427EB8A5 ON announcement (request_id)');
        $this->addSql('ALTER TABLE dog ADD announcement_id INT NOT NULL');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397D913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_812C397D913AEA17 ON dog (announcement_id)');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3256915B');
        $this->addSql('DROP INDEX IDX_B6BD307F3256915B ON message');
        $this->addSql('ALTER TABLE message ADD user_id INT NOT NULL, CHANGE relation_id announcement_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F913AEA17 FOREIGN KEY (announcement_id) REFERENCES announcement (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F913AEA17 ON message (announcement_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76ED395 ON message (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dog_race');
        $this->addSql('DROP TABLE request_users');
        $this->addSql('DROP TABLE request_dog');
        $this->addSql('ALTER TABLE adopter CHANGE town town VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE department department VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE first_name first_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C67B3B43D');
        $this->addSql('ALTER TABLE announcement DROP FOREIGN KEY FK_4DB9D91C427EB8A5');
        $this->addSql('DROP INDEX IDX_4DB9D91C67B3B43D ON announcement');
        $this->addSql('DROP INDEX IDX_4DB9D91C427EB8A5 ON announcement');
        $this->addSql('ALTER TABLE announcement DROP users_id, DROP request_id, CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE infos infos VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE breeder CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397D913AEA17');
        $this->addSql('DROP INDEX UNIQ_812C397D913AEA17 ON dog');
        $this->addSql('ALTER TABLE dog DROP announcement_id, CHANGE background background VARCHAR(500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(1500) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F913AEA17');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('DROP INDEX IDX_B6BD307F913AEA17 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FA76ED395 ON message');
        $this->addSql('ALTER TABLE message ADD relation_id INT NOT NULL, DROP announcement_id, DROP user_id, CHANGE text text VARCHAR(8000) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3256915B FOREIGN KEY (relation_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F3256915B ON message (relation_id)');
        $this->addSql('ALTER TABLE picture CHANGE title title VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE link link VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE discr discr VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
