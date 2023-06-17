<?php

namespace Controllers;

use MVC\Router;

class CitaController {
    public static function index(Router $router) {
        
        $router->view('cita/index', [

        ]);
    }
}