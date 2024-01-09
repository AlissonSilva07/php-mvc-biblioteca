CREATE TABLE livros (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    autoria VARCHAR(255) NOT NULL,
    editora VARCHAR(255) NOT NULL,
    anoPublicacao INT(4) NOT NULL,
    disponivel boolean NOT NULL,
    dataCriacao date NOT NULL,
PRIMARY KEY (id))