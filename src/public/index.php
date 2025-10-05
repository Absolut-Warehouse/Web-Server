<?php

/**
 * Core
 * Le noyau du programme.
 * J'ai refait une version superlégère de Symfony,
 * un modèle MCV très très rudimentaire
 */
require __DIR__ . '/../core/Router.php';
require __DIR__ . '/../core/View.php';
require __DIR__ . '/../core/helpers.php';


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
require __DIR__ . '/../app/Controllers/MainController.php';


/**
 * Routes
 * Les listes des chemins existants
 */
require __DIR__ . '/../routes/web.php';



use Core\Router;

/**
 * Cette page s'active à chaque fois qu'un utilisateur cherche à se connecter au site.
 * C'est depuis ici qu'on va décider quel page sera renvoyé.
 */

Router::dispatch();
