<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->post('auth/login', 'LoginController::mobileLogin');
$routes->post('auth/logout', 'LoginController::mobileLogout');
