<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('api', static function ($routes) {
    $routes->post('my_conversations_list', 'Api\ConversationController::getMyConversationsList');
    $routes->post('conversation/(:num)', 'Api\ConversationController::getConversationDataByID/$1');
    $routes->get('profile', 'Api\UserData::index');
    
    // $routes->presenter('Resource/Message');
});
