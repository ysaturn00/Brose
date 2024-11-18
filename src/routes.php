<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/edit/{id}', 'EmployeeController@editEmployee');
$router->get('/delete/{id}', 'EmployeeController@deleteEmployee');

$router->post('/editEmployee/{id}', 'EmployeeController@editEmployeeAction');

$router->post('/createEmployee', 'EmployeeController@createEmployee');
$router->post('/createDepartment', 'EmployeeController@createDepartment');
$router->post('/createPosition', 'EmployeeController@createPosition');
$router->post('/createSkill', 'SkillsController@createSkill');

$router->get('/login', 'LoginController@signin');
$router->get('/logout', 'LoginController@signout');
$router->post('/login', 'LoginController@signinAction');

$router->get('/skills/{id}', 'SkillsController@index');

// $router->get('/usuario/{id}/editar', 'UsuariosController@edit');
// $router->post('/usuario/{id}/editar', 'UsuariosController@editAction');


$router->get('/usuario/{id}/deletar', 'UsuariosController@delete');