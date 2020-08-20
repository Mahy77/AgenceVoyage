<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200819090937 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination ADD sejour_id INT NOT NULL');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA84CF0CF FOREIGN KEY (sejour_id) REFERENCES sejour (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3EC63EAA84CF0CF ON destination (sejour_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA84CF0CF');
        $this->addSql('DROP INDEX UNIQ_3EC63EAA84CF0CF ON destination');
        $this->addSql('ALTER TABLE destination DROP sejour_id');
    }
}
