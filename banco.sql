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
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(20),
    email VARCHAR(100),
    celular VARCHAR(20),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id)
);


select * from Usuario;

delete from Usuario where id = 4;
delete from Usuario where id = 5;

INSERT INTO usuarios (nome, email,passwrd, login, ativo) VALUES ('ADRIEL','adriel.loan.da.cruz@gmail.com','202cb962ac59075b964b07152d234b70', '21232f297a57a5a743894a0e4a801fc3',TRUE);