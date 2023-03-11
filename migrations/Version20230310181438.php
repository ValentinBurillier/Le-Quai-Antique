<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310181438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wines ADD price14 INT NOT NULL, ADD price75 INT NOT NULL, DROP price_14_c_l, DROP price_75_c_l, CHANGE category category VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wines ADD price_14_c_l INT NOT NULL, ADD price_75_c_l INT NOT NULL, DROP price14, DROP price75, CHANGE category category VARCHAR(100) DEFAULT NULL');
    }
}
