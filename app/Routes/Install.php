<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('install', static function ($routes) {
    $routes->add('', 'Install::index');
});
