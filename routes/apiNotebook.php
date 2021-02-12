<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('notebooks', 'ApiNotebook@list');
    $router->get('notebooks/search/{id}','ApiNotebook@search');
    $router->post('notebooks/create','ApiNotebook@create');
    $router->put('notebooks/update/{id}','ApiNotebook@update');
    $router->delete('notebooks/delete/{id}','ApiNotebook@delete');
});
