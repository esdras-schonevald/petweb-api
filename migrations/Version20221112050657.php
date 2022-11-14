<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221112050657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE agenda_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE agendamento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cartao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categoria_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cliente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dia_semana_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE endereco_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE especie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE estoque_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE forma_pagamento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fornecedor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE grupo_usuario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE item_pedido_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lancamento_futuro_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mensagem_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE operacao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pedido_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE perfil_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoa_fisica_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pessoa_juridica_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE prestador_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE produto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE servico_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_agendamento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tema_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_transacao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transacao_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuario_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE agenda (id INT NOT NULL, dia_semana_id INT DEFAULT NULL, prestador_id INT NOT NULL, dia SMALLINT DEFAULT NULL, mes SMALLINT DEFAULT NULL, ano SMALLINT DEFAULT NULL, hora_inicio TIME(0) WITHOUT TIME ZONE DEFAULT NULL, hora_fim TIME(0) WITHOUT TIME ZONE DEFAULT NULL, flag_restricao BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2CEDC877E9F4D193 ON agenda (dia_semana_id)');
        $this->addSql('CREATE INDEX IDX_2CEDC877D2DB9D53 ON agenda (prestador_id)');
        $this->addSql('CREATE TABLE agendamento (id INT NOT NULL, agenda_id INT NOT NULL, servico_id INT NOT NULL, cliente_id INT NOT NULL, status_id INT NOT NULL, data DATE DEFAULT NULL, hora TIME(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1F6FB7AAEA67784A ON agendamento (agenda_id)');
        $this->addSql('CREATE INDEX IDX_1F6FB7AA82E14982 ON agendamento (servico_id)');
        $this->addSql('CREATE INDEX IDX_1F6FB7AADE734E51 ON agendamento (cliente_id)');
        $this->addSql('CREATE INDEX IDX_1F6FB7AA6BF700BD ON agendamento (status_id)');
        $this->addSql('CREATE TABLE cartao (id INT NOT NULL, conta_id INT NOT NULL, numero VARCHAR(16) NOT NULL, validade DATE NOT NULL, cvv VARCHAR(3) NOT NULL, titular VARCHAR(45) NOT NULL, bandeira VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A8D50C1E628EE05C ON cartao (conta_id)');
        $this->addSql('CREATE TABLE categoria (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cliente (id INT NOT NULL, pessoa_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B25DF6FA0A5 ON cliente (pessoa_id)');
        $this->addSql('CREATE TABLE dia_semana (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE endereco (id INT NOT NULL, cep VARCHAR(8) DEFAULT NULL, logradouro VARCHAR(255) DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, complemento VARCHAR(255) DEFAULT NULL, cidade VARCHAR(255) DEFAULT NULL, estado VARCHAR(255) DEFAULT NULL, pais VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE especie (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE estoque (id INT NOT NULL, produto_id INT NOT NULL, quantidade INT NOT NULL, preco DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9CE0780A105CFD56 ON estoque (produto_id)');
        $this->addSql('CREATE TABLE forma_pagamento (id INT NOT NULL, nome VARCHAR(255) NOT NULL, parcelas SMALLINT DEFAULT NULL, juro DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE fornecedor (id INT NOT NULL, pessoa_juridica_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10B663A0A894CDDE ON fornecedor (pessoa_juridica_id)');
        $this->addSql('CREATE TABLE grupo_usuario (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE item_pedido (id INT NOT NULL, pedido_id INT NOT NULL, produto_id INT DEFAULT NULL, servico_id INT DEFAULT NULL, quantidade INT NOT NULL, preco DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_421563014854653A ON item_pedido (pedido_id)');
        $this->addSql('CREATE INDEX IDX_42156301105CFD56 ON item_pedido (produto_id)');
        $this->addSql('CREATE INDEX IDX_4215630182E14982 ON item_pedido (servico_id)');
        $this->addSql('CREATE TABLE lancamento_futuro (id INT NOT NULL, operacao_id INT NOT NULL, data DATE NOT NULL, descricao VARCHAR(255) DEFAULT NULL, valor DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_841A85B15BD59BA3 ON lancamento_futuro (operacao_id)');
        $this->addSql('CREATE TABLE mensagem (id INT NOT NULL, cliente_id INT DEFAULT NULL, assunto VARCHAR(255) DEFAULT NULL, texto VARCHAR(1023) DEFAULT NULL, flag_elogio BOOLEAN NOT NULL, flag_reclamacao BOOLEAN NOT NULL, flag_sugestao BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9E4532B0DE734E51 ON mensagem (cliente_id)');
        $this->addSql('CREATE TABLE operacao (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pedido (id INT NOT NULL, cliente_id INT NOT NULL, endereco_id INT DEFAULT NULL, forma_pagamento_id INT NOT NULL, data DATE NOT NULL, desconto DOUBLE PRECISION DEFAULT NULL, frete DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C4EC16CEDE734E51 ON pedido (cliente_id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CE1BB76823 ON pedido (endereco_id)');
        $this->addSql('CREATE INDEX IDX_C4EC16CE79AFB555 ON pedido (forma_pagamento_id)');
        $this->addSql('CREATE TABLE perfil (id INT NOT NULL, pessoa_juridica_id INT NOT NULL, tema_id INT NOT NULL, logomarca VARCHAR(255) DEFAULT NULL, descricao_negocio VARCHAR(511) DEFAULT NULL, flag_modo_escuro BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_96657647A894CDDE ON perfil (pessoa_juridica_id)');
        $this->addSql('CREATE INDEX IDX_96657647A64A8A17 ON perfil (tema_id)');
        $this->addSql('CREATE TABLE pessoa (id INT NOT NULL, id_endereco_id INT DEFAULT NULL, telefone VARCHAR(11) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1CDFAB823A5A5D4 ON pessoa (id_endereco_id)');
        $this->addSql('CREATE TABLE pessoa_fisica (id INT NOT NULL, id_pessoa_id INT NOT NULL, cpf VARCHAR(11) DEFAULT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_35AF33755F5A1C82 ON pessoa_fisica (id_pessoa_id)');
        $this->addSql('CREATE TABLE pessoa_juridica (id INT NOT NULL, pessoa_id INT NOT NULL, cnpj VARCHAR(14) DEFAULT NULL, razao_social VARCHAR(255) DEFAULT NULL, nome_fantasia VARCHAR(255) DEFAULT NULL, data_abertura DATE DEFAULT NULL, fone_comercial VARCHAR(11) DEFAULT NULL, representante_legal VARCHAR(255) DEFAULT NULL, cpf_representante VARCHAR(11) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_776DFB0EDF6FA0A5 ON pessoa_juridica (pessoa_id)');
        $this->addSql('CREATE TABLE pet (id INT NOT NULL, cliente_id INT NOT NULL, especie_id INT NOT NULL, nome VARCHAR(255) NOT NULL, raca VARCHAR(255) DEFAULT NULL, cor VARCHAR(255) DEFAULT NULL, sexo VARCHAR(1) DEFAULT NULL, idade SMALLINT DEFAULT NULL, flag_castrado BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E4529B85DE734E51 ON pet (cliente_id)');
        $this->addSql('CREATE INDEX IDX_E4529B85E70ED95B ON pet (especie_id)');
        $this->addSql('CREATE TABLE prestador (id INT NOT NULL, pessoa_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_309F8F56DF6FA0A5 ON prestador (pessoa_id)');
        $this->addSql('CREATE TABLE produto (id INT NOT NULL, fornecedor_id INT NOT NULL, categoria_id INT NOT NULL, codigo VARCHAR(255) DEFAULT NULL, nome VARCHAR(255) NOT NULL, validade DATE DEFAULT NULL, peso INT DEFAULT NULL, descricao VARCHAR(511) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CAC49D7D3EBB69D ON produto (fornecedor_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D73397707A ON produto (categoria_id)');
        $this->addSql('CREATE TABLE servico (id INT NOT NULL, nome VARCHAR(255) NOT NULL, duracao INT DEFAULT NULL, preco DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE status_agendamento (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tema (id INT NOT NULL, cor_primaria VARCHAR(6) DEFAULT NULL, cor_secundaria VARCHAR(6) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tipo_transacao (id INT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transacao (id INT NOT NULL, conta_id INT NOT NULL, tipo_transacao_id INT NOT NULL, operacao_id INT NOT NULL, data TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, descricao VARCHAR(255) DEFAULT NULL, valor DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6C9E60CE628EE05C ON transacao (conta_id)');
        $this->addSql('CREATE INDEX IDX_6C9E60CE3C69F5F2 ON transacao (tipo_transacao_id)');
        $this->addSql('CREATE INDEX IDX_6C9E60CE5BD59BA3 ON transacao (operacao_id)');
        $this->addSql('CREATE TABLE usuario (id INT NOT NULL, pessoa_id INT NOT NULL, grupo_usuario_id INT NOT NULL, conta_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DDF6FA0A5 ON usuario (pessoa_id)');
        $this->addSql('CREATE INDEX IDX_2265B05DDBD30545 ON usuario (grupo_usuario_id)');
        $this->addSql('CREATE INDEX IDX_2265B05D628EE05C ON usuario (conta_id)');
        $this->addSql('ALTER TABLE agenda ADD CONSTRAINT FK_2CEDC877E9F4D193 FOREIGN KEY (dia_semana_id) REFERENCES dia_semana (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agenda ADD CONSTRAINT FK_2CEDC877D2DB9D53 FOREIGN KEY (prestador_id) REFERENCES prestador (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AAEA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AA82E14982 FOREIGN KEY (servico_id) REFERENCES servico (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AADE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agendamento ADD CONSTRAINT FK_1F6FB7AA6BF700BD FOREIGN KEY (status_id) REFERENCES status_agendamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cartao ADD CONSTRAINT FK_A8D50C1E628EE05C FOREIGN KEY (conta_id) REFERENCES conta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B25DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE estoque ADD CONSTRAINT FK_9CE0780A105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fornecedor ADD CONSTRAINT FK_10B663A0A894CDDE FOREIGN KEY (pessoa_juridica_id) REFERENCES pessoa_juridica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item_pedido ADD CONSTRAINT FK_421563014854653A FOREIGN KEY (pedido_id) REFERENCES pedido (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item_pedido ADD CONSTRAINT FK_42156301105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item_pedido ADD CONSTRAINT FK_4215630182E14982 FOREIGN KEY (servico_id) REFERENCES servico (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lancamento_futuro ADD CONSTRAINT FK_841A85B15BD59BA3 FOREIGN KEY (operacao_id) REFERENCES operacao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mensagem ADD CONSTRAINT FK_9E4532B0DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CEDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pedido ADD CONSTRAINT FK_C4EC16CE79AFB555 FOREIGN KEY (forma_pagamento_id) REFERENCES forma_pagamento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE perfil ADD CONSTRAINT FK_96657647A894CDDE FOREIGN KEY (pessoa_juridica_id) REFERENCES pessoa_juridica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE perfil ADD CONSTRAINT FK_96657647A64A8A17 FOREIGN KEY (tema_id) REFERENCES tema (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa ADD CONSTRAINT FK_1CDFAB823A5A5D4 FOREIGN KEY (id_endereco_id) REFERENCES endereco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa_fisica ADD CONSTRAINT FK_35AF33755F5A1C82 FOREIGN KEY (id_pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pessoa_juridica ADD CONSTRAINT FK_776DFB0EDF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B85DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pet ADD CONSTRAINT FK_E4529B85E70ED95B FOREIGN KEY (especie_id) REFERENCES especie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE prestador ADD CONSTRAINT FK_309F8F56DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE produto ADD CONSTRAINT FK_5CAC49D7D3EBB69D FOREIGN KEY (fornecedor_id) REFERENCES fornecedor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE produto ADD CONSTRAINT FK_5CAC49D73397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE628EE05C FOREIGN KEY (conta_id) REFERENCES conta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE3C69F5F2 FOREIGN KEY (tipo_transacao_id) REFERENCES tipo_transacao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE5BD59BA3 FOREIGN KEY (operacao_id) REFERENCES operacao (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DDF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES pessoa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DDBD30545 FOREIGN KEY (grupo_usuario_id) REFERENCES grupo_usuario (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D628EE05C FOREIGN KEY (conta_id) REFERENCES conta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE conta ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE agenda_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE agendamento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cartao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categoria_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cliente_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dia_semana_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE endereco_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE especie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE estoque_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE forma_pagamento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fornecedor_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE grupo_usuario_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_pedido_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lancamento_futuro_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mensagem_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE operacao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pedido_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE perfil_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoa_fisica_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pessoa_juridica_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE prestador_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE servico_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_agendamento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_transacao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transacao_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuario_id_seq CASCADE');
        $this->addSql('ALTER TABLE agenda DROP CONSTRAINT FK_2CEDC877E9F4D193');
        $this->addSql('ALTER TABLE agenda DROP CONSTRAINT FK_2CEDC877D2DB9D53');
        $this->addSql('ALTER TABLE agendamento DROP CONSTRAINT FK_1F6FB7AAEA67784A');
        $this->addSql('ALTER TABLE agendamento DROP CONSTRAINT FK_1F6FB7AA82E14982');
        $this->addSql('ALTER TABLE agendamento DROP CONSTRAINT FK_1F6FB7AADE734E51');
        $this->addSql('ALTER TABLE agendamento DROP CONSTRAINT FK_1F6FB7AA6BF700BD');
        $this->addSql('ALTER TABLE cartao DROP CONSTRAINT FK_A8D50C1E628EE05C');
        $this->addSql('ALTER TABLE cliente DROP CONSTRAINT FK_F41C9B25DF6FA0A5');
        $this->addSql('ALTER TABLE estoque DROP CONSTRAINT FK_9CE0780A105CFD56');
        $this->addSql('ALTER TABLE fornecedor DROP CONSTRAINT FK_10B663A0A894CDDE');
        $this->addSql('ALTER TABLE item_pedido DROP CONSTRAINT FK_421563014854653A');
        $this->addSql('ALTER TABLE item_pedido DROP CONSTRAINT FK_42156301105CFD56');
        $this->addSql('ALTER TABLE item_pedido DROP CONSTRAINT FK_4215630182E14982');
        $this->addSql('ALTER TABLE lancamento_futuro DROP CONSTRAINT FK_841A85B15BD59BA3');
        $this->addSql('ALTER TABLE mensagem DROP CONSTRAINT FK_9E4532B0DE734E51');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CEDE734E51');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CE1BB76823');
        $this->addSql('ALTER TABLE pedido DROP CONSTRAINT FK_C4EC16CE79AFB555');
        $this->addSql('ALTER TABLE perfil DROP CONSTRAINT FK_96657647A894CDDE');
        $this->addSql('ALTER TABLE perfil DROP CONSTRAINT FK_96657647A64A8A17');
        $this->addSql('ALTER TABLE pessoa DROP CONSTRAINT FK_1CDFAB823A5A5D4');
        $this->addSql('ALTER TABLE pessoa_fisica DROP CONSTRAINT FK_35AF33755F5A1C82');
        $this->addSql('ALTER TABLE pessoa_juridica DROP CONSTRAINT FK_776DFB0EDF6FA0A5');
        $this->addSql('ALTER TABLE pet DROP CONSTRAINT FK_E4529B85DE734E51');
        $this->addSql('ALTER TABLE pet DROP CONSTRAINT FK_E4529B85E70ED95B');
        $this->addSql('ALTER TABLE prestador DROP CONSTRAINT FK_309F8F56DF6FA0A5');
        $this->addSql('ALTER TABLE produto DROP CONSTRAINT FK_5CAC49D7D3EBB69D');
        $this->addSql('ALTER TABLE produto DROP CONSTRAINT FK_5CAC49D73397707A');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE628EE05C');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE3C69F5F2');
        $this->addSql('ALTER TABLE transacao DROP CONSTRAINT FK_6C9E60CE5BD59BA3');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT FK_2265B05DDF6FA0A5');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT FK_2265B05DDBD30545');
        $this->addSql('ALTER TABLE usuario DROP CONSTRAINT FK_2265B05D628EE05C');
        $this->addSql('DROP TABLE agenda');
        $this->addSql('DROP TABLE agendamento');
        $this->addSql('DROP TABLE cartao');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE dia_semana');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('DROP TABLE especie');
        $this->addSql('DROP TABLE estoque');
        $this->addSql('DROP TABLE forma_pagamento');
        $this->addSql('DROP TABLE fornecedor');
        $this->addSql('DROP TABLE grupo_usuario');
        $this->addSql('DROP TABLE item_pedido');
        $this->addSql('DROP TABLE lancamento_futuro');
        $this->addSql('DROP TABLE mensagem');
        $this->addSql('DROP TABLE operacao');
        $this->addSql('DROP TABLE pedido');
        $this->addSql('DROP TABLE perfil');
        $this->addSql('DROP TABLE pessoa');
        $this->addSql('DROP TABLE pessoa_fisica');
        $this->addSql('DROP TABLE pessoa_juridica');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE prestador');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE servico');
        $this->addSql('DROP TABLE status_agendamento');
        $this->addSql('DROP TABLE tema');
        $this->addSql('DROP TABLE tipo_transacao');
        $this->addSql('DROP TABLE transacao');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('CREATE SEQUENCE conta_id_seq');
        $this->addSql('SELECT setval(\'conta_id_seq\', (SELECT MAX(id) FROM conta))');
        $this->addSql('ALTER TABLE conta ALTER id SET DEFAULT nextval(\'conta_id_seq\')');
    }
}
