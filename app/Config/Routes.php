<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Administrator::index');

$routes->get('/listproduct', 'Administrator::listproduct');
$routes->get('/addproduct', 'Administrator::addproduct');
$routes->post('/actionaddproduct', 'Administrator::actionaddproduct');
$routes->get('/editproduct/(:any)', 'Administrator::editproduct/$1');
$routes->post('/actioneditproduct(:segment)', 'Administrator::actioneditproduct/$1');
$routes->get('/delproduct/(:any)', 'Administrator::delproduct/$1');

$routes->get('/listkategori', 'Administrator::listkategori');
$routes->get('/addkategori', 'Administrator::addkategori');
$routes->post('/actionaddkategori', 'Administrator::actionaddkategori');
$routes->get('/editkategori/(:any)', 'Administrator::editkategori/$1');
$routes->post('/actioneditkategori/(:segment)', 'Administrator::actioneditkategori/$1');
$routes->get('/delkategori/(:any)', 'Administrator::delkategori/$1');










$routes->get('/foto/(:any)', 'Administrator::foto/$1');