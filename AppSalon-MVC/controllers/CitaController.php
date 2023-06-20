<?php

namespace Controllers;

use MVC\Router;

class CitaController {
    public static function index(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $router->view('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}