<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'classificado'], function ($router) {
    $router->get('/', 'ClassificadoController@index');
    $router->get('/adicionar', 'ClassificadoController@register');
    $router->post('/adicionar', 'ClassificadoController@store');
    $router->post('/atualizar/{id}', 'ClassificadoController@update');
    $router->get('/deletar/{id}', 'ClassificadoController@distroy');
});

?>