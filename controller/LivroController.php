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


        public function listLivros() {
            try {
                $livros = LivroDAO::todosLivros($this->conn);

                $response = new ResponseHandler();

                if ($livros == null) {
                    http_response_code(404);
                    echo $response->getJson('Ainda não existem livros cadastrados.', $livros);
                } else {
                    http_response_code(200);
                    echo $response->getJson('A busca retornou os livros com sucesso', $livros);
                }            

            } catch (PDOException $e) {
                echo "Ocorreu um erro: " . $e->getMessage();
            }
                       
        }

        public function searchLivro(int $idLivro) {
            try {
                $livroPorID = LivroDAO::livroPorID($this->conn, $idLivro);

                $response = new ResponseHandler();

                if ($livroPorID == null) {
                    http_response_code(404);
                    echo $response->getJson('A busca não retornou nenhum usuário com o id ' . $idLivro, $livroPorID);
                } else {
                    http_response_code(200);
                    echo $response->getJson('A busca retornou o livro de id ' . $idLivro .  ' com sucesso.', $livroPorID);
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function saveLivro($livroData) {
            try {
                $livroSalvar = LivroDAO::salvarLivro($this->conn, $livroData);

                $response = new ResponseHandler();

                if ($livroSalvar == null) {
                    http_response_code(400);
                    echo $response->getJson('Erro ao salvar o livro.', $livroSalvar);
                } else {
                    http_response_code(200);
                    echo $response->getJson('O livro foi salvo com sucesso.', $livroSalvar);
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function deleteLivro($idLivro) {           
            try {
                $livroDeletar = LivroDAO::deletarLivro($this->conn, $idLivro);

                $response = new ResponseHandler();

                if ($livroDeletar == false) {
                    http_response_code(404);
                    echo $response->getJson('Não foi encontrado um livro com id ' . $idLivro, $livroDeletar);
                } else {
                    http_response_code(200);
                    echo $response->getJson('O livro de id ' . $idLivro . ' foi deletado com sucesso.', $livroDeletar);
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function updateLivro($idLivro, $livroAtualizar) {
            try {
                $livroAtualizar = LivroDAO::atualizarLivro($this->conn, $idLivro, $livroAtualizar);

                $response = new ResponseHandler();

                if ($livroAtualizar == false) {
                    http_response_code(404);
                    echo $response->getJson('Não foi encontrado um livro com id ' . $idLivro, $livroAtualizar);
                } else {
                    http_response_code(200);
                    echo $response->getJson('O livro de id ' . $idLivro . ' foi atualizado com sucesso.', $livroAtualizar);
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }