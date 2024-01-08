<?php

    namespace Alisson\controller;

    require_once '../autoload.php';

    use Alisson\dao\LivroDAO;
    use Alisson\model\response\ResponseHandler;
    use PDO;
    use PDOException;

    class LivroController {
        private PDO $conn;

        public function __construct(PDO $conn)
        {
            $this->conn = $conn;
        }


        public function listarLivros() {
            try {
                $livros = LivroDAO::todosLivros($this->conn);

                $response = new ResponseHandler();
                
                echo $response->getJson(http_response_code(200), 
                                'A busca retornou os usuários com sucesso',
                                $livros);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
                       
        }

        public function livroPorID(int $idLivro) {
            try {
                $livroPorID = LivroDAO::livroPorID($this->conn, $idLivro);

                $response = new ResponseHandler();
                
                echo $response->getJson(http_response_code(200), 
                                'A busca retornou os usuários com sucesso',
                                $livroPorID);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
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