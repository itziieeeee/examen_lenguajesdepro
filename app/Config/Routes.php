
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

/*ruta para el login*/
$routes->get('login', 'Home::login');

/*rutas para los Likes*/
$routes->get('like_controller/agregar/(:num)', 'LikeController::agregar/$1');
$routes->get('like_controller/quitar/(:num)', 'LikeController::quitar/$1');
$routes->get('historial_controller/registrar/(:segment)/(:num)', 'HistorialController::registrar/$1/$2');