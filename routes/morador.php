<?php
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'morador'], function ($router){
    $router->get('/', "MoradorController@index");
    $router->get('/editar', "MoradorController@edit");
    $router->post('/editar', "MoradorController@update");
    $router->post('/deletar', "MoradorController@distroy");
})

?>