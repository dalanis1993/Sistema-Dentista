<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/**
 * ----------------
 * Router Setup
 *-----------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
//$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);




 $routes->get('/', 'Dashboard::index');

//service('auth')->routes($routes);
service('auth')->routes($routes, ['except' => ['login', 'register']]);

$routes->get('login', '\App\Controllers\LoginController::loginView');
$routes->get('register', '\App\Controllers\RegisterController::registerView');
$routes->post('register', '\App\Controllers\RegisterController::registerAction');
$routes->post('login', '\App\Controllers\LoginController::loginAction');
$routes->get('logout', '\App\Controllers\LoginController::logoutAction');
