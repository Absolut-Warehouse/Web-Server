<?php
namespace App\Controllers;

use Core\Lang;

class TechController
{
    public function index()
    {
        // Récupérer langue
        $lang = Lang::get();

        // IP utilisateur (gestion X-Forwarded-For)
        $ip = null;
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // peut contenir une liste d'IPs séparées par des virgules
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($ipList[0]);
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'Unknown';
        }

        // Collecte d'informations
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
        $acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'Unknown';
        $referer = $_SERVER['HTTP_REFERER'] ?? null;
        $method = $_SERVER['REQUEST_METHOD'] ?? 'CLI';
        $protocol = $_SERVER['SERVER_PROTOCOL'] ?? 'Unknown';
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || ($_SERVER['SERVER_PORT'] ?? '') == 443;
        $serverSoftware = $_SERVER['SERVER_SOFTWARE'] ?? php_uname();
        $remotePort = $_SERVER['REMOTE_PORT'] ?? 'Unknown';
        $serverName = $_SERVER['SERVER_NAME'] ?? ($_SERVER['HTTP_HOST'] ?? 'Unknown');

        // PHP / environment
        $phpVersion = PHP_VERSION;
        $memoryLimit = ini_get('memory_limit') ?: 'Unknown';
        $maxExecutionTime = ini_get('max_execution_time') ?: 'Unknown';
        $loadedExtensions = array_values(get_loaded_extensions());
        sort($loadedExtensions);

        // Time info
        $now = new \DateTimeImmutable('now', new \DateTimeZone(date_default_timezone_get()));
        $serverTime = $now->format('Y-m-d H:i:s');
        $serverTimeIso = $now->format(\DateTime::ATOM);
        $timezone = date_default_timezone_get();

        // Headers (sélectionnés) — filtrer pour ne pas afficher d'éventuels en-têtes sensibles
        $headers = [];
        foreach (['Accept', 'Accept-Language', 'User-Agent', 'Referer', 'X-Forwarded-For', 'Connection'] as $h) {
            $key = 'HTTP_' . strtoupper(str_replace('-', '_', $h));
            if (isset($_SERVER[$key])) $headers[$h] = $_SERVER[$key];
        }

        // Petite synthèse sur l'agent (noms simples)
        $browser = 'Unknown';
        if (preg_match('/Firefox/i', $userAgent)) $browser = 'Firefox';
        elseif (preg_match('/Chrome/i', $userAgent)) $browser = 'Chrome';
        elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) $browser = 'Safari';
        elseif (preg_match('/Edge/i', $userAgent)) $browser = 'Edge';
        elseif (preg_match('/Trident|MSIE/i', $userAgent)) $browser = 'Internet Explorer';

        // Construire le tableau système
        $system = [
            'ip' => $ip,
            'remote_port' => $remotePort,
            'server_name' => $serverName,
            'is_https' => $isHttps,
            'protocol' => $protocol,
            'method' => $method,
            'user_agent' => $userAgent,
            'browser' => $browser,
            'accept_language' => $acceptLanguage,
            'referer' => $referer,
            'server_software' => $serverSoftware,
            'php_version' => $phpVersion,
            'memory_limit' => $memoryLimit,
            'max_execution_time' => $maxExecutionTime,
            'loaded_extensions' => $loadedExtensions,
            'server_time' => $serverTime,
            'server_time_iso' => $serverTimeIso,
            'timezone' => $timezone,
            'headers' => $headers,
        ];

        // Passer les données à la vue.
        // On fusionne pour que View::make puisse extraire les variables (titre, system, etc.)
        $data = [
            'system' => $system,
            'lang' => $lang,
        ];

        return view('pages/tech', $data);
    }
}
