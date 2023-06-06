<?php

require_once __DIR__.'/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/nosotros', 'f_nosotros');
$router->get('/admin', 'f_admin');
$router->get('/propiedades', 'f_propiedades');

$router->checkRoutes();