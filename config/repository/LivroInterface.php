<?php

    namespace Alisson\config\repository;
    use PDO;

    interface LivroInterface {
        public function todosLivros(PDO $conn);
        public function livroPorID(int $idLivro);
        public function salvarLivro($livro);
        public function deletarLivro(int $idLivro): void;
    }