<?php

namespace Services;
class Router {
    private $routes = [];

    public function get($uri, $handler) {
        $this->routes['GET'][$uri] = $handler;
    }

    public function post($uri, $handler) {
        $this->routes['POST'][$uri] = $handler;
    }

    public function dispatch($url) {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = strtok($url, '?');

        if (isset($this->routes[$method][$url])) {
            $handler = $this->routes[$method][$url];
            $controller = new $handler[0]();
            $controllerMethod = $handler[1];

            // Create a Request object and pass it to the controller method
            $request = new Request($_GET, $_POST, $_SERVER);
            $controller->$controllerMethod($request);
        } else {
            // Handle not found
            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
        }
    }

}
