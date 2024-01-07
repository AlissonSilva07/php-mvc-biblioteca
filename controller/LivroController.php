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
    }