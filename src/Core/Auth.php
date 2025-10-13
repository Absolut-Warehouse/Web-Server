<?php
namespace Core;

//Class à modifier car non sécurisé actuellement
class Auth
{
    /**
     * Vérifie si l'utilisateur est connecté
     */
    public static function check(): bool
    {
        return !empty($_SESSION['user']);
    }

    /**
     * Récupère les informations de l'utilisateur connecté
     */
    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    /**
     * Connecte un utilisateur
     */
    public static function login(array $user): void
    {
        $_SESSION['user'] = $user;
    }

    /**
     * Déconnecte l'utilisateur
     */
    public static function logout(): void
    {
        unset($_SESSION['user']);
    }

    /**
     * Redirige vers la page login si l'utilisateur n'est pas connecté
     */
    public static function requireLogin(): void
    {
        if (!self::check()) {
            redirect('/signin'); // utilise ta fonction helper
        }
    }
}
