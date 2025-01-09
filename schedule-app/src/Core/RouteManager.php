<?php
namespace App\Core;

class RouteManager {
    private $routes = [];

    public function addRoute($path, $controller, $method) {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($uri) {
        $path = parse_url($uri, PHP_URL_PATH);
        if (!isset($this->routes[$path])) {
            throw new \Exception("Route not found");
        }

        $route = $this->routes[$path];
        $controller = new $route['controller']();
        call_user_func([$controller, $route['method']]);
    }
}
