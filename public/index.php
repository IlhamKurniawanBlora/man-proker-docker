<?php
// Autoload class dari folder app/
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/../app/' . $classPath . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use core\Router;

require_once __DIR__ . '/../app/core/Router.php';

$router = new Router();
$router->handleRequest();
