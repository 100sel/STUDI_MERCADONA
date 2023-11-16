<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114190057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product RENAME COLUMN category_id TO category_id_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD9777D11E ON product (category_id_id)');
        $this->addSql('ALTER TABLE promotion RENAME COLUMN product_id TO product_id_id');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C11D7DD1DE18E50B ON promotion (product_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE promotion DROP CONSTRAINT FK_C11D7DD1DE18E50B');
        $this->addSql('DROP INDEX UNIQ_C11D7DD1DE18E50B');
        $this->addSql('ALTER TABLE promotion RENAME COLUMN product_id_id TO product_id');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD9777D11E');
        $this->addSql('DROP INDEX IDX_D34A04AD9777D11E');
        $this->addSql('ALTER TABLE product RENAME COLUMN category_id_id TO category_id');
    }
}
