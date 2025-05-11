<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/favoritos', 'Favoritos::index');
$routes->post('/favoritos/store/(:num)', 'Favoritos::store/$1');
$routes->post('/favoritos/delete/(:num)', 'Favoritos::delete/$1');

$routes->get('/tipos', 'Tipos::index');
$routes->get('/tipos/create', 'Tipos::create');
$routes->post('/tipos/store', 'Tipos::store');
$routes->get('/tipos/edit/(:num)', 'Tipos::edit/$1');
$routes->post('/tipos/update/(:num)', 'Tipos::update/$1');
$routes->post('/tipos/delete/(:num)', 'Tipos::delete/$1');

$routes->get('/plantas', 'Plantas::index');
$routes->get('/plantas/view/(:num)', 'Plantas::view/$1');
$routes->get('/plantas/create', 'Plantas::create');
$routes->post('/plantas/store', 'Plantas::store');
$routes->get('/plantas/edit/(:num)', 'Plantas::edit/$1');
$routes->post('/plantas/update/(:num)', 'Plantas::update/$1');
$routes->get('/plantas/delete/(:num)', 'Plantas::delete/$1');
