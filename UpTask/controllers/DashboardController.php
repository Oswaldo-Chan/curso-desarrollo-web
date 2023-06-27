<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class DashboardController {
    public static function index(Router $router) {
        $router->render('dashboard/index', [

        ]);
    }
}