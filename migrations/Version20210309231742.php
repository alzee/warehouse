<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309231742 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE back ADD take_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE back ADD CONSTRAINT FK_6DCEC1373DF9AAF6 FOREIGN KEY (take_id) REFERENCES take (id)');
        $this->addSql('CREATE INDEX IDX_6DCEC1373DF9AAF6 ON back (take_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE back DROP FOREIGN KEY FK_6DCEC1373DF9AAF6');
        $this->addSql('DROP INDEX IDX_6DCEC1373DF9AAF6 ON back');
    }
}
