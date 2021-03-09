<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309205654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE neo ADD zone_id INT NOT NULL, ADD item_id INT NOT NULL, ADD quantity INT NOT NULL');
        $this->addSql('ALTER TABLE neo ADD CONSTRAINT FK_788FDC139F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE neo ADD CONSTRAINT FK_788FDC13126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_788FDC139F2C3FAB ON neo (zone_id)');
        $this->addSql('CREATE INDEX IDX_788FDC13126F525E ON neo (item_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE neo DROP FOREIGN KEY FK_788FDC139F2C3FAB');
        $this->addSql('ALTER TABLE neo DROP FOREIGN KEY FK_788FDC13126F525E');
        $this->addSql('DROP INDEX IDX_788FDC139F2C3FAB ON neo');
        $this->addSql('DROP INDEX IDX_788FDC13126F525E ON neo');
        $this->addSql('ALTER TABLE neo DROP zone_id, DROP item_id, DROP quantity');
    }
}
