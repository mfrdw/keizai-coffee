<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Administrator::index');
$routes->get('/listproduct', 'Administrator::listproduct');





$routes->get('/foto/(:any)', 'Administrator::foto/$1');