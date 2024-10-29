<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');

$router->get('/usuario/{id}/editar', 'UsuariosController@edit');
$router->post('/usuario/{id}/editar', 'UsuariosController@editAction');


$router->get('/usuario/{id}/deletar', 'UsuariosController@delete');