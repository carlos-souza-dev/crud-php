<?php 

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'IndexController@login');
$router->post('/', "IndexController@home");
$router->get('/sair', 'IndexController@logout');
$router->get('/cadastrar', "IndexController@register");
$router->post('/cadastrar', "IndexController@store");
$router->get('/home', "IndexController@gethome");

?>