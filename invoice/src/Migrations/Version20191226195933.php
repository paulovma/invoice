<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191226195933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Creates Invoice table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE table invoice (id int primary key not null auto_increment, access_key varchar(500) not null, total decimal(10,2) not null);");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql("DROP table invoice;");
    }
}
