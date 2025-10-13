<?php

namespace App\Controllers;

use Core\Router;
use Core\Lang;

class TechController
{
    public function index()
    {
        // --- Langue (déjà correct)
        $lang = Lang::get();

        // --- Informations système
        $system = [
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Inconnue',
            'browser' => $this->getBrowserName($_SERVER['HTTP_USER_AGENT'] ?? ''),
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'server_time' => date('Y-m-d H:i:s'),
            'timezone' => date_default_timezone_get(),
            'php_version' => PHP_VERSION,
            'memory_limit' => ini_get('memory_limit'),
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Inconnu',
            'protocol' => $_SERVER['SERVER_PROTOCOL'] ?? '',
            'method' => $_SERVER['REQUEST_METHOD'] ?? '',
            'is_https' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443,
            'headers' => $this->getRequestHeaders(),
            'loaded_extensions' => get_loaded_extensions(),
            'accept_language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '',
            'referer' => $_SERVER['HTTP_REFERER'] ?? null,
            'remote_port' => $_SERVER['REMOTE_PORT'] ?? '',
            'server_name' => $_SERVER['SERVER_NAME'] ?? '',
        ];

        // --- Données à injecter dans la vue
        $data = [
            "lang" => $lang,
            "system" => $system,
        ];

        // --- Rendu de la vue
        return view('pages/tech', $data);
    }

    /**
     * Retourne un tableau d'en-têtes HTTP (compatible Apache / Nginx)
     */
    private function getRequestHeaders(): array
    {
        if (function_exists('getallheaders')) {
            return getallheaders();
        }

        // Alternative manuelle
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
                $name = str_replace('_', '-', ucwords(strtolower(substr($key, 5)), '_'));
                $headers[$name] = $value;
            }
        }
        return $headers;
    }

    /**
     * Détermine un nom simplifié du navigateur à partir du user agent
     */
    private function getBrowserName(string $userAgent): string
    {
        if (stripos($userAgent, 'Firefox') !== false) return 'Mozilla Firefox';
        if (stripos($userAgent, 'Chrome') !== false && stripos($userAgent, 'Edge') === false) return 'Google Chrome';
        if (stripos($userAgent, 'Edg') !== false) return 'Microsoft Edge';
        if (stripos($userAgent, 'Safari') !== false && stripos($userAgent, 'Chrome') === false) return 'Apple Safari';
        if (stripos($userAgent, 'Opera') !== false || stripos($userAgent, 'OPR') !== false) return 'Opera';
        return 'Navigateur inconnu';
    }
}
