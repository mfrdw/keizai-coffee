<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Administrator::index');
$routes->get('/listproduct', 'Administrator::listproduct');
$routes->get('/addproduct', 'Administrator::addproduct');
$routes->get('/editproduct', 'Administrator::editproduct');

$routes->get('/listkategori', 'Administrator::listkategori');
$routes->get('/addkategori', 'Administrator::addkategori');
$routes->get('/editkategori', 'Administrator::editkategori');





$routes->get('/foto/(:any)', 'Administrator::foto/$1');