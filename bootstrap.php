<?php

spl_autoload_register(function ($className) {
    
    $classDirs = ["classes", "classes/models", "classes/controllers"];
    foreach ($classDirs as $dir) {
        $filePath = "./{$dir}/{$className}.php";
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

set_exception_handler(function ($exception) {
    echo "Uncaught exception: " , $exception->getMessage();
});