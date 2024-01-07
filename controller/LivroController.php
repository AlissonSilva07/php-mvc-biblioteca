<?php

    namespace Alisson\controller;

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\dao\LivroDAO;
    use Alisson\model\LivroModel;
    use PDO;

    class LivroController {
        private PDO $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }


        public function listarLisvros() {
            $livros = LivroDAO::todosLivros($this->conn);
            $json = json_encode($livros);
            echo $json;            
        }
    }