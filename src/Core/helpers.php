<?php

use Core\View;

/**
 * On retrouve ici toutes les petites fonctions qui facilitent grandement la vie
 */


/**
 * Fonction qui facilite la vie.
 * Prend juste un nom de fichier et un tableau d'arguments à passé au fichier.
 * @param string $name
 * @param array $data
 * @return false|string
 * @throws Exception
 */
function view(string $name, array $data = [])
{
    return View::make($name, $data);
}


/**
 * Fichier : app/helpers/url_helper.php
 * Objectif : fournir des fonctions globales pour générer des URLs propres
 */

if (!function_exists('base_url')) {
    /**
     * Retourne l'URL de base du site (avec chemin relatif du projet)
     * Exemple : base_url('/assets/css/style.css')
     */
    function base_url(string $uri = ''): string
    {
        // Détecte automatiquement le protocole et l’hôte
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

        // Construit l'URL complète
        return sprintf('%s://%s%s%s', $scheme, $host, $basePath, $uri);
    }
}

if (!function_exists('site_url')) {
    /**
     * Retourne l'URL d’une route (utile pour les formulaires, liens internes)
     * Exemple : site_url('/commande/envoyer')
     */
    function site_url(string $uri = ''): string
    {
        // ici, tu peux ajouter un préfixe si ton routeur le nécessite
        return base_url($uri);
    }
}


if (!function_exists('redirect')) {
    /**
     * Redirige l'utilisateur vers une URL
     *
     * @param string $url L'URL vers laquelle rediriger
     * @param int $statusCode Code HTTP (par défaut 302)
     */
    function redirect(string $url, int $statusCode = 302): void
    {
        // Nettoyer toute sortie éventuelle
        if (!headers_sent()) {
            http_response_code($statusCode);
            header("Location: $url");
            exit;
        } else {
            // Si les headers ont déjà été envoyés, utiliser JS fallback
            echo "<script>window.location.href='" . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . "';</script>";
            echo "<noscript><meta http-equiv='refresh' content='0;url=" . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . "'></noscript>";
            exit;
        }
    }
}

if (!function_exists('redirect_back')) {
    /**
     * Redirige vers la page précédente (ou $default).
     *
     * @param string $default URL de secours si aucun referer n'est trouvé ou si l'hôte est externe
     */
    function redirect_back()
    {
        if(header("Location: {$_SERVER['HTTP_REFERER']}")==BASE_URL){
            //redirect('/');
            return $_SERVER['HTTP_REFERER'];
        }
        else {
            return $_SERVER['HTTP_REFERER'];
            //header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        exit;
    }
}




if (!function_exists('now')) {
    function now(string $format = 'Y-m-d H:i:s'): string {
        return date($format);
    }
}

if (!function_exists('time_ago')) {
    function time_ago(int $timestamp): string {
        $diff = time() - $timestamp;
        if ($diff < 60) return "$diff sec ago";
        $diff = round($diff / 60);
        if ($diff < 60) return "$diff min ago";
        $diff = round($diff / 60);
        if ($diff < 24) return "$diff h ago";
        $diff = round($diff / 24);
        return "$diff days ago";
    }
}

if (!function_exists('data_builder')) {
    /**
     * Combine plusieurs tableaux en un seul grand tableau associatif.
     *
     * Exemple :
     * data_builder(['a' => 1], ['b' => 2], ['c' => 3]);
     * => ['data_1' => [...], 'data_2' => [...], 'data_3' => [...]]
     *
     * Si tu veux des clés personnalisées :
     * data_builder(['data' => [...], 'language' => [...]]);
     *
     * @param array ...$arrays Liste de tableaux à combiner
     * @return array
     */
    function data_builder(array ...$arrays): array
    {
        $result = [];

        foreach ($arrays as $index => $arr) {
            // Si la clé est déjà bien nommée (par ex. ['data' => [...]]), on garde le nom
            if (count($arr) === 1 && array_keys($arr) === [array_key_first($arr)]) {
                $key = array_key_first($arr);
                $result[$key] = $arr[$key];
            } else {
                // Sinon, on génère une clé générique (data_1, data_2, ...)
                $result['data_' . ($index + 1)] = $arr;
            }
        }

        return $result;
    }
}

