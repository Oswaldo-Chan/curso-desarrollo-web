<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class DashboardController {
    public static function index(Router $router) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Mis Proyectos'
        ]);
    }
}