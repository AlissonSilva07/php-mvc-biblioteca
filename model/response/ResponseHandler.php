<?php

    namespace Alisson\model\response;

    require_once '../autoload.php';

    class ResponseHandler {
        private int $status;
        private string $mensagem;
        private $dados;

        public function __construct() {}

        public function getJson(int $status, string $mensagem, $dados) {
            $responseArr = array(
                "status" => $status,
                "mensagem" => $mensagem,
                "dados" => $dados
            );

            return json_encode($responseArr);
        }
    }