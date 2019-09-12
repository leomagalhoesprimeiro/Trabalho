<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190912204117 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_67C9710043B58490');
        $this->addSql('CREATE TEMPORARY TABLE __temp__aluno AS SELECT id, projeto_id, nome FROM aluno');
        $this->addSql('DROP TABLE aluno');
        $this->addSql('CREATE TABLE aluno (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, projeto_id INTEGER DEFAULT NULL, nome VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_67C9710043B58490 FOREIGN KEY (projeto_id) REFERENCES projeto (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO aluno (id, projeto_id, nome) SELECT id, projeto_id, nome FROM __temp__aluno');
        $this->addSql('DROP TABLE __temp__aluno');
        $this->addSql('CREATE INDEX IDX_67C9710043B58490 ON aluno (projeto_id)');
        $this->addSql('DROP INDEX IDX_A0559D94B39A6AE3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projeto AS SELECT id, orientador_id, nome FROM projeto');
        $this->addSql('DROP TABLE projeto');
        $this->addSql('CREATE TABLE projeto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, orientador_id INTEGER NOT NULL, nome VARCHAR(255) NOT NULL COLLATE BINARY, status BOOLEAN NOT NULL, CONSTRAINT FK_A0559D94B39A6AE3 FOREIGN KEY (orientador_id) REFERENCES professor (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO projeto (id, orientador_id, nome) SELECT id, orientador_id, nome FROM __temp__projeto');
        $this->addSql('DROP TABLE __temp__projeto');
        $this->addSql('CREATE INDEX IDX_A0559D94B39A6AE3 ON projeto (orientador_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_67C9710043B58490');
        $this->addSql('CREATE TEMPORARY TABLE __temp__aluno AS SELECT id, projeto_id, nome FROM aluno');
        $this->addSql('DROP TABLE aluno');
        $this->addSql('CREATE TABLE aluno (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, projeto_id INTEGER DEFAULT NULL, nome VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO aluno (id, projeto_id, nome) SELECT id, projeto_id, nome FROM __temp__aluno');
        $this->addSql('DROP TABLE __temp__aluno');
        $this->addSql('CREATE INDEX IDX_67C9710043B58490 ON aluno (projeto_id)');
        $this->addSql('DROP INDEX IDX_A0559D94B39A6AE3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__projeto AS SELECT id, orientador_id, nome FROM projeto');
        $this->addSql('DROP TABLE projeto');
        $this->addSql('CREATE TABLE projeto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, orientador_id INTEGER NOT NULL, nome VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO projeto (id, orientador_id, nome) SELECT id, orientador_id, nome FROM __temp__projeto');
        $this->addSql('DROP TABLE __temp__projeto');
        $this->addSql('CREATE INDEX IDX_A0559D94B39A6AE3 ON projeto (orientador_id)');
    }
}
