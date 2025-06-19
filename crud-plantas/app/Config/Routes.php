<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ROTAS PÚBLICAS
$routes->post('usuario', 'UsuarioController::create');
$routes->get('login', 'AuthController::loginForm');
$routes->post('login', 'AuthController::login');
$routes->get('cadastro', 'AuthController::cadastroForm');


// ROTAS PROTEGIDAS COM JWT
$routes->group('', ['filter' => 'jwt'], function($routes) {


    // Plantas
    $routes->get('/plantas/create', 'Plantas::create');
    $routes->post('/plantas/store', 'Plantas::store');
    $routes->get('/plantas/edit/(:num)', 'Plantas::edit/$1');
    $routes->post('/plantas/update/(:num)', 'Plantas::update/$1');
    $routes->get('/plantas/delete/(:num)', 'Plantas::delete/$1');
    $routes->get('/plantas', 'Plantas::index');
    $routes->get('/plantas/view/(:num)', 'Plantas::view/$1');
    $routes->get('plantas/listarComFavoritos', 'Plantas::listarComFavoritos');


    $routes->get('/', 'Home::index');

    // Favoritos
    $routes->get('/favoritos', 'Favoritos::index');
    $routes->post('favoritos/store/(:num)', 'Favoritos::store/$1');
    $routes->post('/favoritos/delete/(:num)', 'Favoritos::delete/$1');

    // Tipos
    $routes->post('/tipos/store', 'Tipos::store');
    $routes->get('/tipos/edit/(:num)', 'Tipos::edit/$1');
    $routes->get('/tipos', 'Tipos::index');

    // Comentários
    $routes->post('comentarios/comentar/(:num)', 'ComentarioController::comentar/$1');

    // Perfil e logout
    $routes->get('perfil', 'UsuarioController::perfil');
    $routes->get('logout', 'AuthController::logout');
});

