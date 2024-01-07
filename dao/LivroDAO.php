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


        public static function salvarLivro($livro){

        }

        public static function deletarLivro(int $idLivro): void {

        }
        
    }