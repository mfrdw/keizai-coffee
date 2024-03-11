<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Administrator::index');
$routes->get('/listproduct', 'Administrator::listproduct');
$routes->get('/listkategori', 'Administrator::listkategori');





$routes->get('/foto/(:any)', 'Administrator::foto/$1');