<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: DELETE, OPTIONS");

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\controller\LivroController;

    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
		$controller = new LivroController(ConexaoDB::ConexaoDB());
        $controller->deletarLivro($id);
	} elseif ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    } else {
        http_response_code(400);
        echo 'Método errado.';
        exit();
    }