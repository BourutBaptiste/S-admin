<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928121551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats ADD agence_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AAD1F6E7C3 FOREIGN KEY (agence_id_id) REFERENCES agence (id)');
        $this->addSql('CREATE INDEX IDX_574767AAD1F6E7C3 ON stats (agence_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AAD1F6E7C3');
        $this->addSql('DROP INDEX IDX_574767AAD1F6E7C3 ON stats');
        $this->addSql('ALTER TABLE stats DROP agence_id_id');
    }
}
