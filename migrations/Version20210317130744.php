<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317130744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE box_item (box_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_E97F6917D8177B3F (box_id), INDEX IDX_E97F6917126F525E (item_id), PRIMARY KEY(box_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, box_id INT DEFAULT NULL, item_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_2B219D70D8177B3F (box_id), INDEX IDX_2B219D70126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE box_item ADD CONSTRAINT FK_E97F6917D8177B3F FOREIGN KEY (box_id) REFERENCES box (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE box_item ADD CONSTRAINT FK_E97F6917126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box_item DROP FOREIGN KEY FK_E97F6917D8177B3F');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70D8177B3F');
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE box_item');
        $this->addSql('DROP TABLE entry');
    }
}
