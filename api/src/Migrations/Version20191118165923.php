<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191118165923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE quantitative_value_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE order_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE thing_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rating_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE aggregate_rating_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE postal_address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE brand_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE offer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quantitative_value (id INT NOT NULL, value DOUBLE PRECISION DEFAULT NULL, unit_code TEXT NOT NULL, unit_text TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "order" (id INT NOT NULL, customer_id INT DEFAULT NULL, ordered_item_id INT DEFAULT NULL, order_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F52993989395C3F3 ON "order" (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F529939827D5C145 ON "order" (ordered_item_id)');
        $this->addSql('CREATE TABLE thing (id INT NOT NULL, name TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rating (id INT NOT NULL, author_id INT DEFAULT NULL, rating_value DOUBLE PRECISION DEFAULT NULL, rating_explanation TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8892622F675F31B ON rating (author_id)');
        $this->addSql('CREATE TABLE aggregate_rating (id INT NOT NULL, item_reviewed_id INT DEFAULT NULL, rating_count INT DEFAULT NULL, review_count INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFBC24A8E54D1663 ON aggregate_rating (item_reviewed_id)');
        $this->addSql('CREATE TABLE postal_address (id INT NOT NULL, address_country TEXT DEFAULT NULL, address_locality TEXT DEFAULT NULL, address_region TEXT DEFAULT NULL, post_office_box_number TEXT DEFAULT NULL, postal_code TEXT NOT NULL, street_address TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE brand (id INT NOT NULL, aggregate_rating_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1C52F9588215D706 ON brand (aggregate_rating_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, aggregate_rating_id INT DEFAULT NULL, depth_id INT DEFAULT NULL, height_id INT DEFAULT NULL, width_id INT DEFAULT NULL, weight_id INT DEFAULT NULL, model TEXT DEFAULT NULL, skus TEXT DEFAULT NULL, color TEXT DEFAULT NULL, release_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD8215D706 ON product (aggregate_rating_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD88EF9A6A ON product (depth_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD4679B87C ON product (height_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD253C865B ON product (width_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD350035DC ON product (weight_id)');
        $this->addSql('COMMENT ON COLUMN product.skus IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE product_brand (product_id INT NOT NULL, brand_id INT NOT NULL, PRIMARY KEY(product_id, brand_id))');
        $this->addSql('CREATE INDEX IDX_BD0E82044584665A ON product_brand (product_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BD0E820444F5D008 ON product_brand (brand_id)');
        $this->addSql('CREATE TABLE product_product (product_id INT NOT NULL, PRIMARY KEY(product_id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2931F1D4584665A ON product_product (product_id)');
        $this->addSql('CREATE TABLE product_offer (product_id INT NOT NULL, offer_id INT NOT NULL, PRIMARY KEY(product_id, offer_id))');
        $this->addSql('CREATE INDEX IDX_888AFC624584665A ON product_offer (product_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_888AFC6253C674EE ON product_offer (offer_id)');
        $this->addSql('CREATE TABLE offer (id INT NOT NULL, item_offered_id INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, price_currency TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29D6873EA4D80550 ON offer (item_offered_id)');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, address_id INT DEFAULT NULL, email TEXT DEFAULT NULL, family_name TEXT DEFAULT NULL, given_name TEXT DEFAULT NULL, additional_name TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34DCD176E7927C74 ON person (email)');
        $this->addSql('CREATE INDEX IDX_34DCD176F5B7AF75 ON person (address_id)');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F529939827D5C145 FOREIGN KEY (ordered_item_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622F675F31B FOREIGN KEY (author_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE aggregate_rating ADD CONSTRAINT FK_EFBC24A8E54D1663 FOREIGN KEY (item_reviewed_id) REFERENCES thing (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F9588215D706 FOREIGN KEY (aggregate_rating_id) REFERENCES aggregate_rating (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD8215D706 FOREIGN KEY (aggregate_rating_id) REFERENCES aggregate_rating (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD88EF9A6A FOREIGN KEY (depth_id) REFERENCES quantitative_value (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4679B87C FOREIGN KEY (height_id) REFERENCES quantitative_value (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD253C865B FOREIGN KEY (width_id) REFERENCES quantitative_value (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD350035DC FOREIGN KEY (weight_id) REFERENCES quantitative_value (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_brand ADD CONSTRAINT FK_BD0E82044584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_brand ADD CONSTRAINT FK_BD0E820444F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_product ADD CONSTRAINT FK_2931F1D4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_offer ADD CONSTRAINT FK_888AFC624584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_offer ADD CONSTRAINT FK_888AFC6253C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA4D80550 FOREIGN KEY (item_offered_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (address_id) REFERENCES postal_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD88EF9A6A');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD4679B87C');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD253C865B');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD350035DC');
        $this->addSql('ALTER TABLE aggregate_rating DROP CONSTRAINT FK_EFBC24A8E54D1663');
        $this->addSql('ALTER TABLE brand DROP CONSTRAINT FK_1C52F9588215D706');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD8215D706');
        $this->addSql('ALTER TABLE person DROP CONSTRAINT FK_34DCD176F5B7AF75');
        $this->addSql('ALTER TABLE product_brand DROP CONSTRAINT FK_BD0E820444F5D008');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F529939827D5C145');
        $this->addSql('ALTER TABLE product_brand DROP CONSTRAINT FK_BD0E82044584665A');
        $this->addSql('ALTER TABLE product_product DROP CONSTRAINT FK_2931F1D4584665A');
        $this->addSql('ALTER TABLE product_offer DROP CONSTRAINT FK_888AFC624584665A');
        $this->addSql('ALTER TABLE offer DROP CONSTRAINT FK_29D6873EA4D80550');
        $this->addSql('ALTER TABLE product_offer DROP CONSTRAINT FK_888AFC6253C674EE');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F52993989395C3F3');
        $this->addSql('ALTER TABLE rating DROP CONSTRAINT FK_D8892622F675F31B');
        $this->addSql('DROP SEQUENCE quantitative_value_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE order_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE thing_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rating_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE aggregate_rating_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE postal_address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE brand_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE offer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE person_id_seq CASCADE');
        $this->addSql('DROP TABLE quantitative_value');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE thing');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE aggregate_rating');
        $this->addSql('DROP TABLE postal_address');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_brand');
        $this->addSql('DROP TABLE product_product');
        $this->addSql('DROP TABLE product_offer');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE person');
    }
}
