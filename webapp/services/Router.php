<?php

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
        $queryString = $_SERVER['QUERY_STRING'];
        parse_str($queryString, $queryParams);

        if (isset($this->routes[$method][$url])) {
            $handler = explode('@', $this->routes[$method][$url]);
            $controller = new $handler[0]();
            $controllerMethod = $handler[1];

            if ($method === 'POST') {
                $postParams = $_POST;
                // Pass both query and POST parameters to the controller method
                $controller->$controllerMethod($queryParams, $postParams);
            } else {
                $controller->$controllerMethod($queryParams);
            }
        } else {
            // Handle not found
            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
        }
    }
}
