<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
/*ruta para el <login></login>*/
$routes->get('login', 'Home::login');