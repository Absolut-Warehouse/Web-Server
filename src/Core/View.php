<?php

namespace Core;

class View
{
    public static function make(string $view, array $data = [])
    {
        $path = __DIR__ . '/../App/Views/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($path)) {
            throw new \Exception("View [{$view}] not found at {$path}");
        }

        extract($data);

        ob_start();
        include $path;
        return ob_get_clean();
    }
}
