<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'classificado'], function ($router) {
    $router->get('/', 'ClassificadoController@index');
    $router->get('/adicionar', 'ClassificadoController@register');
    $router->post('/adicionar', 'ClassificadoController@store');
    $router->get('/editar/{id}', 'ClassificadoController@edit');
    $router->post('/editar/{id}', 'ClassificadoController@update');
    $router->post('/deletar/{id}', 'ClassificadoController@distroy');
});

?>