<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250712104901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE educations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, year DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', school VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educations_skills (educations_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_9EFFE932C05F5D32 (educations_id), INDEX IDX_9EFFE9327FF61858 (skills_id), PRIMARY KEY(educations_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, technology VARCHAR(50) NOT NULL, online_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets_skills (projets_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_F1DB9B597A6CB7 (projets_id), INDEX IDX_F1DB9B7FF61858 (skills_id), PRIMARY KEY(projets_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, level VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educations_skills ADD CONSTRAINT FK_9EFFE932C05F5D32 FOREIGN KEY (educations_id) REFERENCES educations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE educations_skills ADD CONSTRAINT FK_9EFFE9327FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_skills ADD CONSTRAINT FK_F1DB9B597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_skills ADD CONSTRAINT FK_F1DB9B7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educations_skills DROP FOREIGN KEY FK_9EFFE932C05F5D32');
        $this->addSql('ALTER TABLE educations_skills DROP FOREIGN KEY FK_9EFFE9327FF61858');
        $this->addSql('ALTER TABLE projets_skills DROP FOREIGN KEY FK_F1DB9B597A6CB7');
        $this->addSql('ALTER TABLE projets_skills DROP FOREIGN KEY FK_F1DB9B7FF61858');
        $this->addSql('DROP TABLE educations');
        $this->addSql('DROP TABLE educations_skills');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE projets_skills');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
