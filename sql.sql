CREATE DATABASE IF NOT EXISTS imobiliaria;
USE imobiliaria;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    email VARCHAR(45),
    telefone VARCHAR(45),
    senha VARCHAR(45)
);

CREATE TABLE imovel (
    id_imovel INT AUTO_INCREMENT PRIMARY KEY,
    tipo_imovel VARCHAR(45),
    endereco VARCHAR(45),
    quartos VARCHAR(45),
    banheiros VARCHAR(45),
    garagem VARCHAR(45),
    valor VARCHAR(45),
    disponivel TINYINT,
    metragem VARCHAR(45),
    cliente_id_cliente INT,
    FOREIGN KEY (cliente_id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE foto_imovel (
    id_foto_imovel INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id_cliente INT,
    FOREIGN KEY (cliente_id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE agendamento (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    data_hora DATETIME,
    foto_imovel_id_foto_imovel INT,
    FOREIGN KEY (foto_imovel_id_foto_imovel) REFERENCES foto_imovel(id_foto_imovel)
);

CREATE TABLE venda_imovel (
    id_venda_imovel INT AUTO_INCREMENT PRIMARY KEY,
    id_transacao VARCHAR(45),
    id_cliente VARCHAR(45), 
    agendamento_id_agendamento INT,
    foto_imovel_id_foto_imovel INT,
    imovel_id_imovel INT,
    cliente_id_cliente INT,

    FOREIGN KEY (agendamento_id_agendamento) REFERENCES agendamento(id_agendamento),
    FOREIGN KEY (foto_imovel_id_foto_imovel) REFERENCES foto_imovel(id_foto_imovel),
    FOREIGN KEY (imovel_id_imovel) REFERENCES imovel(id_imovel),
    FOREIGN KEY (cliente_id_cliente) REFERENCES cliente(id_cliente)
);