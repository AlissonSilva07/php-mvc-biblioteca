<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\controller\LivroController;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$controller = new LivroController(ConexaoDB::ConexaoDB());
        $controller->listarLivros();
	} elseif ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    } else {
        http_response_code(200);
        echo 'Nenhum produto foi cadastrado ainda.';
        exit();
    }



