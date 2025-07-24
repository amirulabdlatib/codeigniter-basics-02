<?php

namespace Admin\Config;

use Config\Services;

$routes = Services::routes();


$routes->group(
    'admin',
    [
        'namespace' => 'Admin\Controllers',
        'filter' => "group:admin"
    ],
    function ($routes) {
        $routes->get("users", "Users::index");
        $routes->get("users/(:num)", "Users::show/$1");
        $routes->post("users/(:num)/toggle-ban", "Users::toggleBan/$1");
    }
);
