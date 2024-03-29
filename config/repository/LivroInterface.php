<?php

    namespace Alisson\config\repository;
    use PDO;

    interface LivroInterface {
        public static function todosLivros(PDO $conn);
        public static function livroPorID(PDO $conn, int $idLivro);
        public static function salvarLivro(PDO $conn, $livro);
        public static function deletarLivro(PDO $conn, int $idLivro): bool;
        public static function atualizarLivro(PDO $conn, $idLivro, $livroAtualizar);
    }