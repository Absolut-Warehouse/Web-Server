<?php
namespace Core;

use App\Models\User;
use App\Models\UserActivity;
use Random\RandomException;

class Auth
{
    private const SESSION_USER_ID = 'user_id';
    private const SESSION_TOKEN = 'session_token';
    private const SESSION_LAST_ACTIVITY = 'last_activity';

    private static function getConfig(): array
    {
        $configPath = __DIR__ . '/../App/Config/config.php';
        if (!file_exists($configPath)) {
            throw new \RuntimeException("Fichier de configuration introuvable: {$configPath}");
        }

        $config = require $configPath;
        return $config['security'] ?? [];
    }

    /**
     * Récupère le timeout de session défini dans config.php
     */
    private static function getSessionTimeout(): int
    {
        $security = self::getConfig();
        return $security['session_lifetime'];
    }

    /**
     * Vérifie si l'utilisateur est connecté et que la session est valide.
     */
    public static function check(): bool
    {
        if (empty($_SESSION[self::SESSION_USER_ID]) || empty($_SESSION[self::SESSION_TOKEN])) {
            return false;
        }

        $userId = (int)$_SESSION[self::SESSION_USER_ID];
        $sessionToken = $_SESSION[self::SESSION_TOKEN];

        // Vérifier la correspondance avec la base
        $activity = (new UserActivity())->where('user_id', $userId)->first();
        if (!$activity || $activity['session_token'] !== $sessionToken) {
            self::logout();
            return false;
        }

        // Vérifier l'expiration
        $timeout = self::getSessionTimeout();
        if (isset($_SESSION[self::SESSION_LAST_ACTIVITY]) &&
            (time() - $_SESSION[self::SESSION_LAST_ACTIVITY]) > $timeout) {
            self::logout();
            return false;
        }

        // Rafraîchir le timestamp d’activité
        $_SESSION[self::SESSION_LAST_ACTIVITY] = time();
        (new UserActivity())->update($userId, ['last_action' => date('Y-m-d H:i:s')], 'user_id');

        return true;
    }

    /**
     * Retourne l'utilisateur connecté
     */
    public static function user(): ?array
    {
        if (!self::check()) {
            return null;
        }

        $userId = $_SESSION[self::SESSION_USER_ID];
        return (new User())->find((int)$userId);
    }

    /**
     * Connecte un utilisateur
     * @throws RandomException
     */
    public static function login(array $user): void
    {
        $security = self::getConfig();
//        if (!empty($security['session_name'])) {
//            session_name($security['session_name']);
//        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_regenerate_id(true);

        //Format UUID valide Pgsql
        $token = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            random_int(0, 0xffff), random_int(0, 0xffff),
            random_int(0, 0xffff),
            random_int(0, 0x0fff) | 0x4000,
            random_int(0, 0x3fff) | 0x8000,
            random_int(0, 0xffff), random_int(0, 0xffff), random_int(0, 0xffff)
        );

        $now = date('Y-m-d H:i:s');

        $_SESSION[self::SESSION_USER_ID] = $user['user_id'];
        $_SESSION[self::SESSION_TOKEN] = $token;
        $_SESSION[self::SESSION_LAST_ACTIVITY] = time();

        // Mise à jour ou création de l'activité
        $activityModel = new UserActivity();
        $existing = $activityModel->where('user_id', $user['user_id'])->first();

        if ($existing) {
            $activityModel->update($user['user_id'], [
                'last_login' => $now,
                'last_action' => $now,
                'session_token' => $token
            ], 'user_id');
        } else {
            $activityModel->create([
                'user_id' => $user['user_id'],
                'created_at' => $now,
                'last_login' => $now,
                'last_action' => $now,
                'session_token' => $token
            ]);
        }

        $security = self::getConfig();

// Définir le nom de session AVANT session_start
        if (!empty($security['session_name']) && session_status() === PHP_SESSION_NONE) {
            session_name($security['session_name']);
        }

        // Démarrer la session si nécessaire
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Régénérer l'ID
        session_regenerate_id(true);

        // Configurer le cookie
        if (!empty($security['session_lifetime'])) {
            setcookie(session_name(), session_id(), [
                'expires' => time() + $security['session_lifetime'],
                'path' => '/',
                'secure' => isset($_SERVER['HTTPS']),
                'httponly' => true,
                'samesite' => 'Strict',
            ]);
        }

    }

    /**
     * Déconnecte proprement
     */
    public static function logout(): void
    {
        if (!empty($_SESSION[self::SESSION_USER_ID])) {
            $userId = $_SESSION[self::SESSION_USER_ID];
            (new UserActivity())->update($userId, ['session_token' => null], 'user_id');
        }

        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    /**
     * Redirige si non connecté
     */
    public static function requireLogin(): void
    {
        if (!self::check()) {
            redirect('/signin');
        }
    }
}
