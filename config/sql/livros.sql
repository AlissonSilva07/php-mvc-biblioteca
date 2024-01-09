CREATE TABLE livros (
    idLivro INT NOT NULL AUTO_INCREMENT,
    nomeLivro VARCHAR(255) NOT NULL,
    autorLivro VARCHAR(255) NOT NULL,
    disponivel boolean NOT NULL,
    dataInicio DATE NOT NULL,
    dataDevolucao DATE NOT NULL,
PRIMARY KEY (idLivro))