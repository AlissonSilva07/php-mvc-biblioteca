<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\controller\LivroController;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json_data = file_get_contents('php://input');
		$livroData = json_decode($json_data);
    
        $controller = new LivroController(ConexaoDB::ConexaoDB());
        $controller->salvarLivro($livroData);

	} elseif ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    } else {
        http_response_code(400);
        echo 'Método errado.';
        exit();
    }