<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411155445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD user_username VARCHAR(50) NOT NULL, ADD user_firstname VARCHAR(50) NOT NULL, ADD user_lastname VARCHAR(50) NOT NULL, ADD user_birthday DATE NOT NULL, ADD user_gender VARCHAR(200) NOT NULL, ADD user_picture VARCHAR(200) NOT NULL, ADD user_phonenumber VARCHAR(255) NOT NULL, ADD user_level INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP user_username, DROP user_firstname, DROP user_lastname, DROP user_birthday, DROP user_gender, DROP user_picture, DROP user_phonenumber, DROP user_level');
    }
}
