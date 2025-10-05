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

/**
 * Redirige l'utilisateur vers une URL
 *
 * @param string $url L'URL vers laquelle rediriger
 * @param int $statusCode Code HTTP (par défaut 302)
 */
function redirect(string $url, int $statusCode = 302): void {
    // Nettoyer toute sortie éventuelle
    if (!headers_sent()) {
        http_response_code($statusCode);
        header("Location: $url");
        exit;
    } else {
        // Si les headers ont déjà été envoyés, utiliser JS fallback
        echo "<script>window.location.href='".htmlspecialchars($url, ENT_QUOTES, 'UTF-8')."';</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=".htmlspecialchars($url, ENT_QUOTES, 'UTF-8')."'></noscript>";
        exit;
    }
}