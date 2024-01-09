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
            $sqlQuery = "SELECT * FROM livros WHERE idLivro = :idLivro";
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
            $livroPostar = new LivroModel($livroData->nomeLivro, $livroData->autorLivro, $livroData->disponivel, $livroData->dataInicio, $livroData->dataDevolucao);

            if (isset($livroPostar)) {
                //Buscar valores dentro do model
                $nomeLivro = $livroPostar->getNomeLivro();
                $autorLivro = $livroPostar->getAutorLivro();
                $disponivel = $livroPostar->getDisponivel();
                $dataInicio = $livroPostar->getDataInicio();
                $dataDevolucao = $livroPostar->getDataDevolucao();

                $sqlQuery = "INSERT INTO livros (nomeLivro, autorLivro, disponivel, dataInicio, dataDevolucao) VALUES (:nomeLivro, :autorLivro, :disponivel, :dataInicio, :dataDevolucao)";
	            $stmt = $conn->prepare($sqlQuery);

                $stmt->bindParam(':nomeLivro', $nomeLivro);
                $stmt->bindParam(':autorLivro', $autorLivro);
                $stmt->bindParam(':disponivel', $disponivel);
                $stmt->bindParam(':dataInicio', $dataInicio);
                $stmt->bindParam(':dataDevolucao', $dataDevolucao);

                $stmt->execute();

                return $livroPostar;
            } else {
                return "Não foi possível adicionar o produto.";
            }

        }

        public static function deletarLivro(PDO $conn, int $idLivro): bool {

            $busca = self::livroPorID($conn, $idLivro);

            if ($busca == null) {
                return false;
            } else {
                $sqlQuery = "DELETE FROM livros WHERE idLivro = :idLivro";
                $stmt = $conn->prepare($sqlQuery);
                $stmt->bindParam(':idLivro', $idLivro);
                $stmt->execute();

                return true;
            }

        }
        
    }