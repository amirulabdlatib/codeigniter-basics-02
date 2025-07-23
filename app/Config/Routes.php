<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
$routes->get('/articles/(:num)', 'Articles::show/$1');
$routes->get('/articles/create', 'Articles::create');
$routes->post('/articles', 'Articles::store');
$routes->get('/articles/(:num)/edit', 'Articles::edit/$1');
$routes->put('/articles/(:num)', 'Articles::update/$1');
$routes->delete('/articles/(:num)', 'Articles::delete/$1');
$routes->get('/articles/delete/(:num)', 'Articles::delete/$1');
