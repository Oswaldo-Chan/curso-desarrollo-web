<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\CitaController;
use Controllers\LoginController;
$router = new Router();

$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/password-olvidado', [LoginController::class, 'passwordOlvidado']);
$router->post('/password-olvidado', [LoginController::class, 'passwordOlvidado']);
$router->get('/recuperar', [LoginController::class, 'recuperarPassword']);
$router->post('/recuperar', [LoginController::class, 'recuperarPassword']);
$router->get('/crear-cuenta', [LoginController::class, 'crearCuenta']);
$router->post('/crear-cuenta', [LoginController::class, 'crearCuenta']);
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);
//area privada
$router->get('/cita', [CitaController::class, 'index']);

$router->comprobarRutas();