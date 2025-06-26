<?php
namespace core;

class Router {
    public function handleRequest(): void {
        $url = $_GET['url'] ?? 'auth/login';
        $segments = explode('/', trim($url, '/'));

        $controllerName = ucfirst($segments[0]) . 'Controller';
        $method = $segments[1] ?? 'index';

        $controllerClass = 'controllers\\' . $controllerName;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                call_user_func([$controller, $method]);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found: $controllerClass -> $method()";
    }
}
