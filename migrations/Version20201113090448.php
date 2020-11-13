<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113090448 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, account_type_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, opening_date DATETIME NOT NULL, INDEX IDX_CAC89EACA76ED395 (user_id), INDEX IDX_CAC89EACC6798DB (account_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transferts (id INT AUTO_INCREMENT NOT NULL, accounts_id INT NOT NULL, type VARCHAR(30) NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_47A3EBA3CC5E8CE8 (accounts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(30) NOT NULL, firstname VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, city VARCHAR(30) NOT NULL, city_code VARCHAR(20) NOT NULL, address VARCHAR(50) NOT NULL, sex INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EACA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EACC6798DB FOREIGN KEY (account_type_id) REFERENCES account_types (id)');
        $this->addSql('ALTER TABLE transferts ADD CONSTRAINT FK_47A3EBA3CC5E8CE8 FOREIGN KEY (accounts_id) REFERENCES accounts (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EACC6798DB');
        $this->addSql('ALTER TABLE transferts DROP FOREIGN KEY FK_47A3EBA3CC5E8CE8');
        $this->addSql('ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EACA76ED395');
        $this->addSql('DROP TABLE account_types');
        $this->addSql('DROP TABLE accounts');
        $this->addSql('DROP TABLE transferts');
        $this->addSql('DROP TABLE users');
    }
}
