<?php

require_once __DIR__.'/../includes/app.php';

use MVC\Router;
use Controllers\PageController;
use Controllers\LoginController;
use Controllers\SellerController;
use Controllers\ArticleController;
use Controllers\PropertyController;

$router = new Router();

$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/properties/create', [PropertyController::class, 'create']);
$router->post('/properties/create', [PropertyController::class, 'create']);
$router->get('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/update', [PropertyController::class, 'update']);
$router->post('/properties/delete', [PropertyController::class, 'delete']);

$router->get('/sellers/create', [SellerController::class, 'create']);
$router->post('/sellers/create', [SellerController::class, 'create']);
$router->get('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/update', [SellerController::class, 'update']);
$router->post('/sellers/delete', [SellerController::class, 'delete']);

$router->get('/blog/create', [ArticleController::class, 'create']);
$router->post('/blog/create', [ArticleController::class, 'create']);
$router->get('/blog/update', [ArticleController::class, 'update']);
$router->post('/blog/update', [ArticleController::class, 'update']);
$router->post('/blog/delete', [ArticleController::class, 'delete']);

$router->get('/', [PageController::class, 'index']);
$router->get('/about-us', [PageController::class, 'about_us']);
$router->get('/properties', [PageController::class, 'properties']);
$router->get('/property', [PageController::class, 'property']);
$router->get('/blog', [PageController::class, 'blog']);
$router->get('/article', [PageController::class, 'article']);
$router->get('/contact', [PageController::class, 'contact']);
$router->post('/contact', [PageController::class, 'contact']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->post('/logout', [LoginController::class, 'logout']);

$router->checkRoutes();