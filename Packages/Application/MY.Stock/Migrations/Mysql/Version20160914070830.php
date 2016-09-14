<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20160914070830 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('CREATE TABLE my_stock_domain_model_buyer (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, village VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE my_stock_domain_model_village (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typo3_flow_mvc_routing_objectpathmapping (objecttype VARCHAR(255) NOT NULL, uripattern VARCHAR(255) NOT NULL, pathsegment VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, PRIMARY KEY(objecttype, uripattern, pathsegment)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typo3_flow_resource_resource (persistence_object_identifier VARCHAR(40) NOT NULL, collectionname VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, filesize NUMERIC(20, 0) NOT NULL, relativepublicationpath VARCHAR(255) NOT NULL, mediatype VARCHAR(100) NOT NULL, sha1 VARCHAR(40) NOT NULL, md5 VARCHAR(32) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typo3_flow_security_account (persistence_object_identifier VARCHAR(40) NOT NULL, accountidentifier VARCHAR(255) NOT NULL, authenticationprovidername VARCHAR(255) NOT NULL, credentialssource VARCHAR(255) DEFAULT NULL, creationdate DATETIME NOT NULL, expirationdate DATETIME DEFAULT NULL, lastsuccessfulauthenticationdate DATETIME DEFAULT NULL, failedauthenticationcount INT DEFAULT NULL, roleidentifiers LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', UNIQUE INDEX flow_identity_typo3_flow_security_account (accountidentifier, authenticationprovidername), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE my_stock_domain_model_booked (persistence_object_identifier VARCHAR(40) NOT NULL, invoice VARCHAR(40) DEFAULT NULL, bookamount VARCHAR(255) NOT NULL, bookdate DATETIME NOT NULL, INDEX IDX_12BDE53390651744 (invoice), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE my_stock_domain_model_invoice (persistence_object_identifier VARCHAR(40) NOT NULL, buyer VARCHAR(40) DEFAULT NULL, id VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, totalprice VARCHAR(255) NOT NULL, remainingamounttopay VARCHAR(255) NOT NULL, ispaid TINYINT(1) NOT NULL, INDEX IDX_3D8A2CF184905FB3 (buyer), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE my_stock_domain_model_booked ADD CONSTRAINT FK_12BDE53390651744 FOREIGN KEY (invoice) REFERENCES my_stock_domain_model_invoice (persistence_object_identifier)');
        $this->addSql('ALTER TABLE my_stock_domain_model_invoice ADD CONSTRAINT FK_3D8A2CF184905FB3 FOREIGN KEY (buyer) REFERENCES my_stock_domain_model_buyer (persistence_object_identifier)');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE my_stock_domain_model_invoice DROP FOREIGN KEY FK_3D8A2CF184905FB3');
        $this->addSql('ALTER TABLE my_stock_domain_model_booked DROP FOREIGN KEY FK_12BDE53390651744');
        $this->addSql('DROP TABLE my_stock_domain_model_buyer');
        $this->addSql('DROP TABLE my_stock_domain_model_village');
        $this->addSql('DROP TABLE typo3_flow_mvc_routing_objectpathmapping');
        $this->addSql('DROP TABLE typo3_flow_resource_resource');
        $this->addSql('DROP TABLE typo3_flow_security_account');
        $this->addSql('DROP TABLE my_stock_domain_model_booked');
        $this->addSql('DROP TABLE my_stock_domain_model_invoice');
    }
}