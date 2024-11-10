<?php

use core\Router;

$router = new Router();

// GET
$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

// $router->get('/usuario/{id}/editar', 'UsuariosController@edit');
// $router->post('/usuario/{id}/editar', 'UsuariosController@editAction');


$router->get('/usuario/{id}/deletar', 'UsuariosController@delete');