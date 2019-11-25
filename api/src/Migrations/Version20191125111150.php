<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125111150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, name VARCHAR(100) NOT NULL, address VARCHAR(255) DEFAULT NULL, gps_lat DOUBLE PRECISION DEFAULT NULL, gps_lon DOUBLE PRECISION DEFAULT NULL, type VARCHAR(50) DEFAULT NULL, working_from VARCHAR(10) DEFAULT NULL, working_till VARCHAR(10) DEFAULT NULL, on_weekends VARCHAR(20) DEFAULT NULL, machines INT DEFAULT NULL, client_id INT NOT NULL, reference VARCHAR(20) DEFAULT NULL, refiller INT DEFAULT NULL, technician INT DEFAULT NULL, manager INT DEFAULT NULL, encashment INT DEFAULT NULL, supervisor_1 INT DEFAULT NULL, supervisor_2 INT DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fax VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, refill_time INT DEFAULT NULL, encashment_time INT DEFAULT NULL, maintenance_time INT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP TABLE location');
    }
}
