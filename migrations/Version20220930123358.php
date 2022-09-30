<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930123358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin_agence (admin_id INT NOT NULL, agence_id INT NOT NULL, INDEX IDX_3909AB50642B8210 (admin_id), INDEX IDX_3909AB50D725330D (agence_id), PRIMARY KEY(admin_id, agence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_agence ADD CONSTRAINT FK_3909AB50642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_agence ADD CONSTRAINT FK_3909AB50D725330D FOREIGN KEY (agence_id) REFERENCES agence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `admin` ADD nom_a VARCHAR(255) NOT NULL, ADD prenom_a VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_agence DROP FOREIGN KEY FK_3909AB50642B8210');
        $this->addSql('ALTER TABLE admin_agence DROP FOREIGN KEY FK_3909AB50D725330D');
        $this->addSql('DROP TABLE admin_agence');
        $this->addSql('ALTER TABLE `admin` DROP nom_a, DROP prenom_a');
    }
}
