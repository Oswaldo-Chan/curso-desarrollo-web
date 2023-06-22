<?php

namespace Controllers;

use MVC\Router;

class ServicioController {
    public static function index(Router $router) {
        
        $router->view('servicios/index', [

        ]);
    }
    public static function crear(Router $router) {
        if ($_SERVER['REQUEST_METHOD' === 'POST']) {
            # code...
        }
    }
    public static function actualizar(Router $router) {
        if ($_SERVER['REQUEST_METHOD' === 'POST']) {
            # code...
        }
    }
    public static function eliminar(Router $router) {
        if ($_SERVER['REQUEST_METHOD' === 'POST']) {
            # code...
        }
    }
}