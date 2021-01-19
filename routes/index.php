<?php 

$router->get('/', 'MoradorController@login');
$router->post('/', "MoradorController@home");

?>