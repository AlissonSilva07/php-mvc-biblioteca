<?php

    spl_autoload_register(
        function (string $className)
        {
            $fullPath = str_replace('Alisson', '..', $className);
            $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $fullPath) . '.php';

            if (file_exists($filePath))
            {
                require_once $filePath;
            }
        }
    );