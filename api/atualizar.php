<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, PUT, OPTIONS");

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\controller\LivroController;

    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $json_data = file_get_contents('php://input');
        $livroData = json_decode($json_data);

		$controller = new LivroController(ConexaoDB::ConexaoDB());
        $controller->updateLivro($id, $livroData);
	} elseif ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    } else {
        http_response_code(400);
        echo 'Método errado.';
        exit();
    }