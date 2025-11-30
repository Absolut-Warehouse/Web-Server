<?php
/**
 * Core
 * Le noyau du programme.
 * J'ai refait une version superlégère de Symfony,
 * un modèle MCV très très rudimentaire
 */
require __DIR__ . '/../Core/Router.php';//Module de décisions et gestions des controllers
require __DIR__ . '/../Core/View.php'; //Module pour le chargement des Views
require __DIR__ . '/../Core/helpers.php'; //Module avec des commandes utiles
require __DIR__ . '/../Core/Lang.php'; //Module de gestion des langues
require __DIR__ . '/../Core/Database.php';//Module servant à la connexion à la DB pgsql
require __DIR__ . '/../Core/Model.php';//Module servant aux opérations sur les tables de la DB
require __DIR__ . '/../Core/Route.php';//
require __DIR__ . '/../Core/Auth.php';//


/**
 * Models
 */
require __DIR__ . '/../App/Models/User.php';
require __DIR__ . '/../App/Models/Container.php';
require __DIR__ . '/../App/Models/Item.php';
require __DIR__ . '/../App/Models/Address.php';
require __DIR__ . '/../App/Models/Package.php';
require __DIR__ . '/../App/Models/Order.php';
require __DIR__ . '/../App/Models/UserActivity.php';
require __DIR__ . '/../App/Models/Employee.php';
require __DIR__ . '/../App/Models/WorksOn.php';
require __DIR__ . '/../App/Models/Terminal.php';
require __DIR__ . '/../App/Models/StorageZone.php';



/**
 * La Config, là où se trouvent toutes les données sensibles
*/
$config = require __DIR__ . '/../App/Config/config.php';
define('COMPANY_NAME', $config['app_info']['company_name']);
define('WEBSITE_VERSION', $config['app_info']['app_version']);
define('AUTHORS', $config['app_info']['app_author']);
define('BASE_URL', $config['app_info']['base_url']);
define('BASE_PATH', dirname(__DIR__, 1));

/**
 * Controleurs
 * Très utile pour exécuter un code particulier genre une vérification
 * avant le chargement d'une page.
 * Par exemple pour vérifier que l'utilisateur est bien connecté.
 */
require __DIR__ . '/../App/Controllers/MainController.php';
require __DIR__ . '/../App/Controllers/AccountController.php';
require __DIR__ . '/../App/Controllers/SearchController.php';
require __DIR__ . '/../App/Controllers/TechController.php';
require __DIR__ . '/../App/Controllers/LangController.php';
require __DIR__ . '/../App/Controllers/EmployeeController.php';

/**
 * Routes
 * Les listes des chemins existants
 */
require __DIR__ . '/../App/Routes/web.php';


use Core\Lang;
use Core\Router;

/**
 * Cette page s'active à chaque fois qu'un utilisateur cherche à se connecter au site.
 * C'est depuis ici qu'on va décider quel page sera renvoyé.
 */



if (!empty($config['security']['session_name'])) {
    session_name($config['security']['session_name']);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


//On charge la langue sauvegardé en cookie
$langCode = $_COOKIE['lang'] ?? null;
Lang::init($langCode);

Router::dispatch();
