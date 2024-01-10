<?php

    namespace Alisson\dao;

    require_once '../autoload.php';

    use Alisson\config\repository\LivroInterface;
    use Alisson\model\LivroModel;
    use PDO;
    use PDOException;

    class LivroDAO implements LivroInterface {

        public static function todosLivros(PDO $conn) {
            $livros = array();

			$sqlQuery = "SELECT * FROM livros";
			$stmt = $conn->prepare($sqlQuery);
            $stmt->execute();

			while ($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                $livros[] = $row;
            } if (!empty($livros)) {
                return $livros;
            }
        }

        public static function livroPorID(PDO $conn, int $idLivro) {
            $sqlQuery = "SELECT * FROM livros WHERE id = :idLivro";
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindParam(':idLivro', $idLivro);
            $stmt->execute();

            $row = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (empty($row)) {
                    return null;
            } else {
                    return $row;
            }
        }


        public static function salvarLivro(PDO $conn, $livroData){
            if (empty($livroData)) {
                return null;                
            } else {
                $livroPostar = new LivroModel($livroData->titulo, $livroData->autoria, $livroData->editora, $livroData->anoPublicacao, $livroData->disponivel);

                //Buscar valores dentro do model
                $titulo = $livroPostar->getTitulo();
                $autoria = $livroPostar->getAutoria();
                $editora = $livroPostar->getEditora();
                $anoPublicacao = $livroPostar->getAnoPublicacao();
                $disponivel = $livroPostar->getDisponivel();

                //Formata a data
                $dataAtual = date('Y-m-d');
                $dataCriacao = $dataAtual;

                $sqlQuery = "INSERT INTO livros (titulo, autoria, editora, anoPublicacao, disponivel, dataCriacao) VALUES (:titulo, :autoria, :editora, :anoPublicacao, :disponivel, :dataCriacao)";
                $stmt = $conn->prepare($sqlQuery);

                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':autoria', $autoria);
                $stmt->bindParam(':editora', $editora);
                $stmt->bindParam(':anoPublicacao', $anoPublicacao);
                $stmt->bindParam(':disponivel', $disponivel);
                $stmt->bindParam(':dataCriacao', $dataCriacao);

                $stmt->execute();

                return $livroData;
            }

        }

        public static function deletarLivro(PDO $conn, int $idLivro): bool {

            $busca = self::livroPorID($conn, $idLivro);

            if ($busca == null) {
                return false;
            } else {
                $sqlQuery = "DELETE FROM livros WHERE id = :idLivro";
                $stmt = $conn->prepare($sqlQuery);
                $stmt->bindParam(':idLivro', $idLivro);
                $stmt->execute();

                return true;
            }

        }

        public static function atualizarLivro(PDO $conn, $idLivro, $livroAtualizar) {

            $busca = self::livroPorID($conn, $idLivro);

            if ($busca == null) {
                return false;
            } else {
                    if (empty($livroAtualizar)) {
                    return null;                
                    } else {
                        $livroUpdate = new LivroModel($livroAtualizar->titulo, $livroAtualizar->autoria, $livroAtualizar->editora, $livroAtualizar->anoPublicacao, $livroAtualizar->disponivel);

                        //Buscar valores dentro do model
                        $titulo = $livroUpdate->getTitulo();
                        $autoria = $livroUpdate->getAutoria();
                        $editora = $livroUpdate->getEditora();
                        $anoPublicacao = $livroUpdate->getAnoPublicacao();
                        $disponivel = $livroUpdate->getDisponivel();

                        $sqlQuery = "UPDATE livros SET titulo = :titulo, autoria = :autoria, editora = :editora, anoPublicacao = :anoPublicacao, disponivel = :disponivel WHERE id = :idLivro";
                        $stmt = $conn->prepare($sqlQuery);

                        $stmt->bindParam(':idLivro', $idLivro);
                        $stmt->bindParam(':titulo', $titulo);
                        $stmt->bindParam(':autoria', $autoria);
                        $stmt->bindParam(':editora', $editora);
                        $stmt->bindParam(':anoPublicacao', $anoPublicacao);
                        $stmt->bindParam(':disponivel', $disponivel);

                        $stmt->execute();

                        return $livroAtualizar;
                    }
            }
        }
        
    }