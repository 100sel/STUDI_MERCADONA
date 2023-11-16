<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114190925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04ad9777d11e');
        $this->addSql('DROP INDEX idx_d34a04ad9777d11e');
        $this->addSql('ALTER TABLE product RENAME COLUMN category_id_id TO category_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('ALTER TABLE promotion DROP CONSTRAINT fk_c11d7dd1de18e50b');
        $this->addSql('DROP INDEX uniq_c11d7dd1de18e50b');
        $this->addSql('ALTER TABLE promotion RENAME COLUMN product_id_id TO product_id');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C11D7DD14584665A ON promotion (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE promotion DROP CONSTRAINT FK_C11D7DD14584665A');
        $this->addSql('DROP INDEX UNIQ_C11D7DD14584665A');
        $this->addSql('ALTER TABLE promotion RENAME COLUMN product_id TO product_id_id');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT fk_c11d7dd1de18e50b FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_c11d7dd1de18e50b ON promotion (product_id_id)');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product RENAME COLUMN category_id TO category_id_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04ad9777d11e FOREIGN KEY (category_id_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d34a04ad9777d11e ON product (category_id_id)');
    }
}
