<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422115531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pet_user (pet_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_96DB3323966F7FB6 (pet_id), INDEX IDX_96DB3323A76ED395 (user_id), PRIMARY KEY(pet_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_pet (user_id INT NOT NULL, pet_id INT NOT NULL, INDEX IDX_F44FA0EA76ED395 (user_id), INDEX IDX_F44FA0E966F7FB6 (pet_id), PRIMARY KEY(user_id, pet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pet_user ADD CONSTRAINT FK_96DB3323966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pet_user ADD CONSTRAINT FK_96DB3323A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_pet ADD CONSTRAINT FK_F44FA0EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_pet ADD CONSTRAINT FK_F44FA0E966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pet_user DROP FOREIGN KEY FK_96DB3323966F7FB6');
        $this->addSql('ALTER TABLE pet_user DROP FOREIGN KEY FK_96DB3323A76ED395');
        $this->addSql('ALTER TABLE user_pet DROP FOREIGN KEY FK_F44FA0EA76ED395');
        $this->addSql('ALTER TABLE user_pet DROP FOREIGN KEY FK_F44FA0E966F7FB6');
        $this->addSql('DROP TABLE pet_user');
        $this->addSql('DROP TABLE user_pet');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
