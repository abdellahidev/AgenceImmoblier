<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181229134247 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lindicap (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_lindicap (property_id INT NOT NULL, lindicap_id INT NOT NULL, INDEX IDX_DCDF0E62549213EC (property_id), INDEX IDX_DCDF0E621A98F85F (lindicap_id), PRIMARY KEY(property_id, lindicap_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_lindicap ADD CONSTRAINT FK_DCDF0E62549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_lindicap ADD CONSTRAINT FK_DCDF0E621A98F85F FOREIGN KEY (lindicap_id) REFERENCES lindicap (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_lindicap DROP FOREIGN KEY FK_DCDF0E621A98F85F');
        $this->addSql('DROP TABLE lindicap');
        $this->addSql('DROP TABLE property_lindicap');
    }
}
