<?php

    namespace Alisson\model\response;

    require_once '../autoload.php';

    class ResponseHandler {
        private int $status;
        private string $mensagem;
        private $dados;

        public function __construct() {}

        public function getJson(string $mensagem, $dados) {
            $responseArr = array(
                "mensagem" => $mensagem,
                "dados" => $dados
            );

            return json_encode($responseArr);
        }
    }