<?php

    namespace Alisson\config\repository;

    use Alisson\model\Livro;

    interface LivroInterface {
        public function todosLivros(): array;
        public function livroPorID(int $idLivro): Livro;
        public function salvarLivro(Livro $livro): Livro;
        public function deletarLivro(int $idLivro): void;
    }