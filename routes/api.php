<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function ($router){
    $router->get('fornecedor', "ApiController@list");
    $router->get('fornecedor/{id}', "ApiController@search");
    $router->get('fornecedor/{id}','ApiController@search');
    $router->get('fornecedor/create','ApiController@create');
    $router->get('fornecedor/{id}','ApiController@update');
    $router->get('fornecedor/{id}','ApiController@delete');
});

?>