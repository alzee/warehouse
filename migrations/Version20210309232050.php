<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309232050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loss ADD item_id INT DEFAULT NULL, ADD take_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE loss ADD CONSTRAINT FK_DE211109126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE loss ADD CONSTRAINT FK_DE2111093DF9AAF6 FOREIGN KEY (take_id) REFERENCES take (id)');
        $this->addSql('CREATE INDEX IDX_DE211109126F525E ON loss (item_id)');
        $this->addSql('CREATE INDEX IDX_DE2111093DF9AAF6 ON loss (take_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loss DROP FOREIGN KEY FK_DE211109126F525E');
        $this->addSql('ALTER TABLE loss DROP FOREIGN KEY FK_DE2111093DF9AAF6');
        $this->addSql('DROP INDEX IDX_DE211109126F525E ON loss');
        $this->addSql('DROP INDEX IDX_DE2111093DF9AAF6 ON loss');
        $this->addSql('ALTER TABLE loss DROP item_id, DROP take_id');
    }
}
