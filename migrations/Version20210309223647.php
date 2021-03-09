<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309223647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE neo DROP FOREIGN KEY FK_788FDC1312469DE2');
        $this->addSql('DROP INDEX IDX_788FDC1312469DE2 ON neo');
        $this->addSql('ALTER TABLE neo DROP category_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE neo ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE neo ADD CONSTRAINT FK_788FDC1312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_788FDC1312469DE2 ON neo (category_id)');
    }
}
