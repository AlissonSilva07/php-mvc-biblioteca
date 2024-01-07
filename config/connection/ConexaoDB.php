<?php

    namespace Alisson\config\connection;

    use PDO;
    use PDOException;

    class ConexaoDB {

        private static $db_client = "mysql";
		private static $db_host = "localhost";
		private static $db_name = "livraria";
		private static $db_user = "root";
		private static $db_pass = "";

        public static function ConexaoDB(): PDO {
            try {
                $pdo = new PDO(self::$db_client . ":host=" . self::$db_host . ";dbname=" . self::$db_name, self::$db_user, self::$db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $pdo;
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }

    }