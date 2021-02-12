<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('smartphones', 'ApiSmartphone@list');
    $router->get('smartphones/search/{id}','ApiSmartphone@search');
    $router->post('smartphones/create','ApiSmartphone@create');
    $router->put('smartphones/update/{id}','ApiSmartphone@update');
    $router->delete('smartphones/delete/{id}','ApiSmartphone@delete');
});
