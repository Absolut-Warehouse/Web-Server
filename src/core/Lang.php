<?php
namespace Core;

class Lang
{
    protected static array $lang = [];
    protected static array $config = [];

    /**
     * Initialise la langue.
     *
     * @param string|null $langCode Code langue optionnel (ex: 'fr', 'en')
     * @throws \Exception si aucun fichier de langue valide n'est trouvé
     */
    public static function init(?string $langCode = null): void
    {
        // Charger la configuration
        $configPath = __DIR__ . '/../config/config.php';
        if (!file_exists($configPath)) {
            throw new \Exception("Fichier de configuration introuvable : $configPath");
        }

        $fullConfig = include $configPath;
        // Sécuriser l'accès aux informations de langue
        $languageInfo = $fullConfig['language_info'] ?? [];

        // Stocker pour debug / introspection
        self::$config = $languageInfo;

        // Valeurs par défaut si config incomplète
        $supported = $languageInfo['installed_languages'] ?? ['fr'];
        $default = $languageInfo['default_language'] ?? 'fr';

        // Si aucun code fourni -> prendre la valeur par défaut
        $langCode = $langCode ?? $default;

        // Normaliser (petites lettres)
        $langCode = strtolower((string)$langCode);

        // Si la langue demandée n'est pas dans la liste, retomber sur la valeur par défaut
        if (!in_array($langCode, $supported, true)) {
            $langCode = $default;
        }

        // Construire le chemin du fichier de langue
        $langPath = __DIR__ . "/../lang/{$langCode}.php";

        // Si le fichier demandé n'existe pas, essayer la langue par défaut (si différente)
        if (!file_exists($langPath)) {
            // tenter fallback sur $default si nécessaire
            if ($langCode !== $default) {
                $fallbackPath = __DIR__ . "/../lang/{$default}.php";
                if (file_exists($fallbackPath)) {
                    $langPath = $fallbackPath;
                    $langCode = $default;
                } else {
                    throw new \Exception("Fichier de langue introuvable pour '{$langCode}' et fallback absent '{$fallbackPath}'");
                }
            } else {
                throw new \Exception("Fichier de langue introuvable : {$langPath}");
            }
        }

        // Inclure et s'assurer que le fichier renvoie bien un tableau
        $translations = include $langPath;
        if (!is_array($translations)) {
            throw new \Exception("Le fichier de langue {$langPath} doit retourner un tableau (array).");
        }

        self::$lang = $translations;

        // Si debug activé dans la config globale, afficher quelle langue a été chargée
        $appDebug = $fullConfig['app_info']['debug'] ?? false;
        if ($appDebug) {
            // pas d'echo massif en prod, seulement en debug
            error_log("[Lang] Langue chargée : {$langCode} ({$langPath})");
        }
    }

    public static function get(): array
    {
        return self::$lang;
    }

    public static function getConfig(): array
    {
        return self::$config;
    }
}
