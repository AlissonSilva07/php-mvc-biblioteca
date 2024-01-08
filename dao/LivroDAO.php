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

			try {
				$sqlQuery = "SELECT * FROM livros";
				$stmt = $conn->prepare($sqlQuery);
                $stmt->execute();

				while ($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $livros[] = $row;
            	}
                
                if (!empty($livros)) {
                    return $livros;
                }

			} catch (PDOException $e) {
            	echo "Error: " . $e->getMessage();
        	}
        }



        public static function livroPorID(PDO $conn, int $idLivro) {
            try {
                $sqlQuery = "SELECT * FROM livros WHERE idLivro = :idLivro";
                $stmt = $conn->prepare($sqlQuery);
                $stmt->bindParam(':idLivro', $idLivro);
                $stmt->execute();

                $row = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $row;

            } catch (PDOException $e) {
            	echo "Error: " . $e->getMessage();
        	}
        }


        public static function salvarLivro(PDO $conn, $livroData){
            $livroPostar = new LivroModel($livroData->nomeLivro, $livroData->autorLivro, $livroData->disponivel, $livroData->dataInicio, $livroData->dataDevolucao);

            if (isset($livroPostar)) {
                try {
                    //Buscar valores dentro do model
                    $nomeLivro = $livroPostar->getNomeLivro();
                    $autorLivro = $livroPostar->getAutorLivro();
                    $disponivel = $livroPostar->getDisponivel();
                    $dataInicio = $livroPostar->getDataInicio();
                    $dataDevolucao = $livroPostar->getDataDevolucao();

                    $sqlQuery = "INSERT INTO livros (nomeLivro, autorLivro, disponivel, dataInicio, dataDevolucao) VALUES (:nomeLivro, :autorLivro, :disponivel, :dataInicio, :dataDevolucao)";
	                $stmt = $conn->prepare($sqlQuery);

                    $stmt->bindParam(':nomeLivro', $nomeLivro, PDO::PARAM_STR);
                    $stmt->bindParam(':autorLivro', $autorLivro, PDO::PARAM_STR);
                    $stmt->bindParam(':disponivel', $disponivel);
                    $stmt->bindParam(':dataInicio', $dataInicio);
                    $stmt->bindParam(':dataDevolucao', $dataDevolucao);

                    $stmt->execute();                    
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Algo ruim aconteceu.";
            }

        }

        public static function deletarLivro(int $idLivro): void {

        }
        
    }