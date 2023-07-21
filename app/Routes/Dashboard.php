<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// $routes->get('/', 'Home::index', ['as' => 'dashboard']);
$routes->match(['get', 'post'], '/', 'Admin\DashboardController::index', ['as' => 'dashboard']);

// $routes->group('api', static function ($routes) {
//     $routes->get('user/details', 'Api\UserData::index');
//     $routes->presenter('Resource/Message');
// });
