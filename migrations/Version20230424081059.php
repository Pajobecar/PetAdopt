<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424081059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pet ADD adopted_bz_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B85B35636D FOREIGN KEY (adopted_bz_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E4529B85B35636D ON pet (adopted_bz_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pet DROP FOREIGN KEY FK_E4529B85B35636D');
        $this->addSql('DROP INDEX IDX_E4529B85B35636D ON pet');
        $this->addSql('ALTER TABLE pet DROP adopted_bz_id');
    }
}
