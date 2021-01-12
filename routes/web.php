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

$router->get('/', "clienteController@index");
$router->post('/', "homeController@store");
$router->get('/adicionar', "homeController@register");
$router->get('/editar', "homeController@edit");
$router->post('/editar', "homeController@update");
$router->post('/deletar', "homeController@distroy");

?>