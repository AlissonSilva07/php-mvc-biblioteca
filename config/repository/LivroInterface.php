<?php

    namespace Alisson\config\repository;

    interface LivroInterface {
        public function todosLivros(): array;
        public function livroPorID(int $idLivro): Livro;
        public function salvarLivro(Livro $livro): Livro;
        public function deletarLivro(int $idLivro): void;
    }