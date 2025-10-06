<?php

/**
 * Core
 * Le noyau du programme.
 * J'ai refait une version superlégère de Symfony,
 * un modèle MCV très très rudimentaire
 */
require __DIR__ . '/../core/Router.php';//Module de décisions et gestions des controllers
require __DIR__ . '/../core/View.php'; //Module pour le chargement des views
require __DIR__ . '/../core/helpers.php'; //Module avec des commandes utiles
require __DIR__ . '/../core/Lang.php'; //Module de gestion des langues



/**
 * La config, là où se trouvent toutes les données sensibles
*/
$config = require __DIR__ . '/../config/config.php';


/**
 * Controleurs
 * Très utile pour exécuter un code particulier genre une vérification
 * avant le chargement d'une page.
 * Par exemple pour vérifier que l'utilisateur est bien connecté.
 */
require __DIR__ . '/../App/Controllers/MainController.php';
require __DIR__ . '/../App/Controllers/AccountController.php';
require __DIR__ . '/../App/Controllers/SearchController.php';

/**
 * Routes
 * Les listes des chemins existants
 */
require __DIR__ . '/../routes/web.php';


use Core\Lang;
use Core\Router;

/**
 * Cette page s'active à chaque fois qu'un utilisateur cherche à se connecter au site.
 * C'est depuis ici qu'on va décider quel page sera renvoyé.
 */


//On charge la langue sauvegardé en cookie
$langCode = $_COOKIE['lang'] ?? 'fr';
Lang::init($langCode);

Router::dispatch();
