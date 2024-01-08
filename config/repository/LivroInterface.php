<?php

    namespace Alisson\config\repository;
    use PDO;

    interface LivroInterface {
        public static function todosLivros(PDO $conn);
        public static function livroPorID(PDO $conn, int $idLivro);
        public static function salvarLivro(PDO $conn, $livro);
        public static function deletarLivro(int $idLivro): void;
    }