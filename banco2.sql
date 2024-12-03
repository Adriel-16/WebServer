CREATE DATABASE agenda;

CREATE TABLE Usuario (
    id SERIAL PRIMARY KEY,
	
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwrd VARCHAR(255) NOT NULL,
    login VARCHAR(50) UNIQUE NOT NULL,
    ativo BOOLEAN DEFAULT TRUE
);

CREATE TABLE Contatos (
    id_cont SERIAL PRIMARY KEY,
    imagem BYTEA,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20),
    endereco VARCHAR(255),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);

CREATE TABLE tarefas (
    id_tarefa SERIAL PRIMARY KEY,
    descricao TEXT NOT NULL,
    status VARCHAR(20) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_conclusao TIMESTAMP
);

ALTER TABLE Contatos ADD COLUMN imagem BYTEA;

DELETE FROM Usuario WHERE id = 3;
DELETE FROM Contatos;
DELETE FROM Chat;

INSERT INTO Chat (nome, msg) VALUES ('Teste', 'Mensagem de teste');

select * from Usuario;
select * from Contatos;
SELECT * FROM Chat;
SELECT * FROM tarefas;

DROP TABLE Contatos;
DROP TABLE Usuario;
DROP TABLE tarefas;

SELECT * FROM Agenda WHERE nome like 'A%';
SELECT * FROM Agenda WHERE nome like 'B%';
SELECT * FROM Agenda WHERE nome like 'C%';
SELECT * FROM Agenda WHERE nome like 'D%';
SELECT * FROM Agenda WHERE nome like 'E%';
SELECT * FROM Agenda WHERE nome like 'F%';
SELECT * FROM Agenda WHERE nome like 'G%';
SELECT * FROM Agenda WHERE nome like 'H%';
SELECT * FROM Agenda WHERE nome like 'I%';
SELECT * FROM Agenda WHERE nome like 'J%';
SELECT * FROM Agenda WHERE nome like 'K%';
SELECT * FROM Agenda WHERE nome like 'L%';
SELECT * FROM Agenda WHERE nome like 'M%';
SELECT * FROM Agenda WHERE nome like 'N%';
SELECT * FROM Agenda WHERE nome like 'O%';
SELECT * FROM Agenda WHERE nome like 'P%';
SELECT * FROM Agenda WHERE nome like 'Q%';
SELECT * FROM Agenda WHERE nome like 'R%';
SELECT * FROM Agenda WHERE nome like 'S%';
SELECT * FROM Agenda WHERE nome like 'T%';
SELECT * FROM Agenda WHERE nome like 'U%';
SELECT * FROM Agenda WHERE nome like 'V%';
SELECT * FROM Agenda WHERE nome like 'W%';
SELECT * FROM Agenda WHERE nome like 'X%';
SELECT * FROM Agenda WHERE nome like 'Y%';
SELECT * FROM Agenda WHERE nome like 'Z%';
