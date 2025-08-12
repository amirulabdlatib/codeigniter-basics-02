<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'login'], function ($routes) {
    $routes->get('/articles', 'Articles::index');
    $routes->get('/articles/(:num)', 'Articles::show/$1');
    $routes->get('/articles/create', 'Articles::create');
    $routes->post('/articles', 'Articles::store');
    $routes->get('/articles/(:num)/edit', 'Articles::edit/$1');
    $routes->put('/articles/(:num)', 'Articles::update/$1');
    $routes->delete('/articles/(:num)', 'Articles::delete/$1');
    $routes->get('/articles/delete/(:num)', 'Articles::delete/$1');
    $routes->get('/articles/(:num)/image/edit','Article\Image::new/$1');
    $routes->post("/articles/(:num)/image/create","Article\Image::create/$1");
    $routes->get("articles/(:num)/image","Article\Image::get/$1");
    $routes->post("articles/(:num)/image/delete","Article\Image::delete/$1");

    $routes->get("set-password", "Password::set");
    $routes->post("set-password", "Password::update");
});

service('auth')->routes($routes);
