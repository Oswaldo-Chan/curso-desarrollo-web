<?php

namespace Controllers;

use MVC\Router;

class ServicioController {
    public static function index(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $router->view('servicios/index', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
    public static function crear(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->view('servicios/crear', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
    public static function actualizar(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->view('servicios/actualizar', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
    public static function eliminar(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
}