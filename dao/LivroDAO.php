<?php

    namespace Alisson\dao;

    require_once '../autoload.php';

    use Alisson\config\repository\LivroInterface;
    use PDO;
    use PDOException;

    class LivroDAO implements LivroInterface {

        public function todosLivros(PDO $conn) {
            $products = array();

			try {
				$sqlQuery = "SELECT * FROM livros";
				$stmt = $conn->query($sqlQuery);

				while ($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $products[] = $row;
            	}

				return $products;

			} catch (PDOException $e) {
            	echo "Error: " . $e->getMessage();
        	}
        }



        public function livroPorID(int $idLivro) {

        }


        public function salvarLivro($livro){

        }

        public function deletarLivro(int $idLivro): void {

        }
        
    }