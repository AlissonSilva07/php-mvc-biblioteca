<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");

    require_once '../autoload.php';

    use Alisson\config\connection\ConexaoDB;
    use Alisson\controller\LivroController;

    $id = $_GET['id'];

    $controller = new LivroController(ConexaoDB::ConexaoDB());
    $controller->livroPorID($id);