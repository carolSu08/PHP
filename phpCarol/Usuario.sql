CREATE DATABASE Usuario;
USE Usuario;

CREATE TABLE Usuariopwii (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(200),
    senha VARCHAR(30),
    telefone INT
);