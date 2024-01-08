<?php

    namespace Alisson\controller;

    require_once '../autoload.php';

    use Alisson\dao\LivroDAO;
    use PDO;

    class LivroController {
        private PDO $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }


        public function listarLivros() {
            $livros = LivroDAO::todosLivros($this->conn);
            $json = json_encode($livros);
            echo $json;            
        }

        public function livroPorID(int $idLivro) {
            $livroPorID = LivroDAO::livroPorID($this->conn, $idLivro);
            $json = json_encode($livroPorID);
            echo $json;  
        }

        public function salvarLivro($livroData) {
            $livroSalvar = LivroDAO::salvarLivro($this->conn, $livroData);
            $json = json_encode($livroSalvar);
            echo $json; 
        }

        public function deletarLivro($idLivro) {
            $livroSalvar = LivroDAO::deletarLivro($this->conn, $idLivro);
        }
    }