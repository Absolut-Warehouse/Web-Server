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
use App\Controllers\AccountController;
use App\Controllers\SearchController;
use App\Controllers\TechController;
use App\Controllers\LangController;


/**
 * ##############
 * #   PUBLIC   #
 * ##############
 */
Router::get('/', [MainController::class, 'index']);
Router::get('/FAQ', [MainController::class, 'faq']);
Router::get('/team', [MainController::class, 'team']);
Router::get('/mission', [MainController::class, 'mission']);
Router::get('/contact', [MainController::class, 'contact']);
Router::get('/tech', [TechController::class, 'index']);
Router::get('/search', [SearchController::class, 'search']);
Router::get('/lang', [LangController::class, 'setlang']);
Router::get('/signup', [AccountController::class, 'signup']);
Router::get('/signin', [AccountController::class, 'signin']);

Router::post('/login', [AccountController::class, 'signinQuery']);
Router::post('/register', [AccountController::class, 'signupQuery']);


/**
 * ##############
 * #  PRIVATE   #
 * ##############
 */
Router::get('/logout', [AccountController::class, 'logout']);
Router::get('/account', [AccountController::class, 'home'])->requireLogin();
Router::get('/orders', [SearchController::class, 'orders'])->requireLogin();
Router::post('/account/delete', [AccountController::class, 'delete'])->requireLogin();
Router::post('/account/update_address', [AccountController::class, 'updateAddress'])->requireLogin();
Router::post('/account/update_profile', [AccountController::class, 'updateProfile'])->requireLogin();



