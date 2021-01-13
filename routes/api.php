<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('fornecedor', 'ApiController@list');
    $router->get('fornecedor/search/{id}','ApiController@search');
    $router->post('fornecedor/create','ApiController@create');
    $router->put('fornecedor/update/{id}','ApiController@update');
    $router->delete('fornecedor/delete/{id}','ApiController@delete');
});

?>