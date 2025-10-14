<?php
namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    private function __construct() {}

    /**
     * Retourne une instance PDO connectée à PostgreSQL (singleton)
     *
     * Attendu : config/config.php retourne un tableau contenant 'db_info' avec
     * host, port, database, user, password et optionnellement charset.
     *
     * @return PDO
     * @throws \RuntimeException
     */
    public static function getConnection(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $configPath = __DIR__ . '/../App/Config/config.php';
        if (!file_exists($configPath)) {
            throw new \RuntimeException('Fichier de configuration introuvable: ' . $configPath);
        }

        $config = require $configPath;
        if (!isset($config['db_info'])) {
            throw new \RuntimeException('db_info manquant dans config/config.php');
        }

        $db = $config['db_info'];
        $host = $db['host'];
        $port = $db['port'];
        $database = $db['database'];
        $username = $db['username'];
        $password = $db['password'];
        $charset = $db['charset'];

        $dsn = sprintf('pgsql:host=%s;port=%s;dbname=%s', $host, $port, $database);

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, $username, $password, $options);

            // Assurer l'encodage client
            if (!empty($charset)) {
                // client_encoding est la méthode recommandée pour PG
                self::$pdo->exec("SET NAMES '{$charset}'");
                self::$pdo->exec("SET client_encoding TO '{$charset}'");
            }
        } catch (PDOException $e) {
            // En prod, logger ; ici on lève une exception claire
            throw new \RuntimeException('Erreur de connexion PostgreSQL : ' . $e->getMessage());
        }

        return self::$pdo;
    }
}
