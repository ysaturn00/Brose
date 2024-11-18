<?php
session_start();
require '../vendor/autoload.php';
require '../src/routes.php';

getActualURI();

$router->run($router->routes);