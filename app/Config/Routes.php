<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

/*ruta para el login*/
$routes->get('login', 'Home::login');

/*rutas para los Likes*/
$routes->get('LikeController/agregar/(:num)', 'LikeController::agregar/$1');
$routes->get('LikeController/quitar/(:num)', 'LikeController::quitar/$1');
$routes->get('HistorialController/registrar/(:segment)/(:num)', 'HistorialController::registrar/$1/$2');

/*rutas para Favoritos (Guardar)*/
$routes->get('FavoritoController/agregar/(:num)', 'FavoritoController::agregar/$1');
$routes->get('FavoritoController/quitar/(:num)', 'FavoritoController::quitar/$1');

/*rutas para la Estrella (Favoritos )*/
$routes->get('EstrellaController/agregar/(:num)', 'EstrellaController::agregar/$1');
$routes->get('EstrellaController/quitar/(:num)', 'EstrellaController::quitar/$1');