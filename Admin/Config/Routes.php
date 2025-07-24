<?php

namespace Admin\Config;

use Config\Services;

$routes = Services::routes();

$routes->get("admin/users", "\Admin\Controllers\Users::index");
