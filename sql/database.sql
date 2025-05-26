-- Criação do banco
CREATE DATABASE projeto_filmes;

-- Usar o banco
\c projeto_filmes;

-- Criação da tabela filmes
CREATE TABLE filmes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    genero VARCHAR(50) NOT NULL,
    nota INT CHECK (nota >= 1 AND nota <= 5) NOT NULL
);
