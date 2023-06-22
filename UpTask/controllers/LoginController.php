<?php

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);

    }
    public static function logout(Router $router) {
        echo "desde logout";
    }
    public static function crear(Router $router) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->render('auth/crear', [
            'titulo' => 'Crear Cuenta'
        ]);
    }
    public static function olvide(Router $router) {
        echo "desde olvide";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function restablecer(Router $router) {
        echo "desde restablecer";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function mensaje(Router $router) {
        echo "desde mensaje";
    }
    public static function confirmar(Router $router) {
        echo "desde confirmar";
    }
}