<?php
namespace App\Core;

use App\Exceptions\NotFoundHttpException;
use BadMethodCallException;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($routes = 'app/routes.php')
    {
        $router = new static;

        require $routes;

        return $router;
    }

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function handle($uri, $requestType)
    {
        if (! array_key_exists($uri, $this->routes[$requestType])) {
            throw new NotFoundHttpException("No routes defined for [uri => '$uri']");
        }

        return $this->act(...explode('@', $this->routes[$requestType][$uri]));
    }

    protected function act($controllerName, $action)
    {
        $controllerName = "App\\Controllers\\{$controllerName}";
        $controller = new $controllerName();
        if (!method_exists($controller, $action)) {
            throw new BadMethodCallException("Controller [{$controllerName}] does not have a method '{$action}'");
        }

        return $controller->$action();
    }
}
