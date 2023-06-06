<?php

require_once __DIR__.'/../includes/app.php';

use MVC\Router;
use Controllers\PropertyController;

$router = new Router();

$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/properties/create', [PropertyController::class, 'create']);
$router->get('/properties/update', [PropertyController::class, 'update']);

$router->checkRoutes();