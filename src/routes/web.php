<?php



/**
 * C'est ici que sont définis tout les chemins possible.
 *
 * Router::get(...) définis une route utilisant la méthode GET
 * Router::post(...) définis une route utilisant la méthode POST
 *
 * Le premier paramètre correspond au chemin demandé par le client,
 * le deuxième correspond au code qui sera exécuté dans le cas ou ça serait la page demandée.
 */


use Core\Router;
use App\Controllers\MainController;

Router::get('/', [MainController::class, 'index']);
Router::get('/profil', [MainController::class, 'show']);
