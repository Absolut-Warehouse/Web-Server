<?php

namespace Core;

/**
 * Classe servant à rediriger les requêtes faites au serveur.
 * Si la ressource demandée existe dans le fichier web.php,
 * alors elle est renvoyé, sinon une erreur 404 est retournée.
 */
class Router
{
    private static array $routes = [];

    /**
     * Fonction servant à créer des "Routes" statiques associé à un URL et utilisant la méthode GET
     * @param string $uri
     * @param callable $callback
     * @return void
     */
    public static function get(string $uri, $callback)
    {
        self::$routes['GET'][$uri] = $callback;
    }

    /**
     * Fonction servant à créer des "Routes" statiques associé à un URL et utilisant la méthode POST
     * @param string $uri
     * @param callable $callback
     * @return void
     */
    public static function post(string $uri, $callback)
    {
        self::$routes['POST'][$uri] = $callback;
    }

    /**
     * À chaque tentative de connexion au serveur, cette requête est appelé.
     * C'est elle qui décide qu'elle page sera chargé.
     */
    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = self::$routes[$method][$uri] ?? null;

        if (!$callback) {
            http_response_code(404);
            $lang = Lang::get();
            $content = ["error_code" => 404, "message" => "Page introuvable."];
            $data = ['lang' => $lang, 'content' => $content];
            echo view("errors/error", $data);
            return;
        }

        //Si un controleur est associé
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

        echo call_user_func($callback);
    }
}
