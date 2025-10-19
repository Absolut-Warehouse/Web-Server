<?php

namespace Core;
use Core\Route;

class Router
{
    private static array $routes = [];

    public static function get(string $uri, $callback): Route
    {
        return self::addRoute('GET', $uri, $callback);
    }

    public static function post(string $uri, $callback): Route
    {
        return self::addRoute('POST', $uri, $callback);
    }

    private static function addRoute(string $method, string $uri, $callback): Route
    {
        $route = new Route($method, $uri, $callback);
        self::$routes[$method][$uri] = $route;
        return $route;
    }

    /**
     * @throws \Exception
     */
    public static function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        /** @var Route|null $route */
        $route = self::$routes[$method][$uri] ?? null;

        if (!$route) {
            http_response_code(404);
            $lang = Lang::get();
            $content = ["error_code" => 404, "message" => "Page introuvable."];
            $data = ['lang' => $lang, 'content' => $content];
            echo view("errors/error", $data);
            return;
        }

        // Vérifie si la route nécessite une connexion
        if ($route->needsLogin()) {
            Auth::requireLogin();
        }

        $callback = $route->getCallback();

        // Contrôleur classique
        if (is_array($callback)) {
            [$class, $methodName] = $callback;

            if (!class_exists($class)) {
                throw new \Exception("Controller {$class} not found.");
            }

            $controller = new $class();

            if (!method_exists($controller, $methodName)) {
                throw new \Exception("Method {$methodName} not found in controller {$class}.");
            }

            echo call_user_func([$controller, $methodName]);
            return;
        }

        // Fonction anonyme ou callback simple
        echo call_user_func($callback);
    }
}
