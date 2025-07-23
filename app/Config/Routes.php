<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
$routes->get('/articles/(:num)', 'Articles::show/$1');
$routes->get('/articles/create', 'Articles::create');
$routes->post('/articles/store', 'Articles::store');
$routes->get('/articles/edit/(:num)', 'Articles::edit/$1');
