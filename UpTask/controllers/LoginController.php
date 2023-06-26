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
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->render('auth/olvide', [
            'titulo' => 'Recuperar Acceso'
        ]);
    }
    public static function restablecer(Router $router) {        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }

        $router->render('auth/restablecer', [
            'titulo' => 'Restablecer Password'
        ]);
    }
    public static function mensaje(Router $router) {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }
    public static function confirmar(Router $router) {

        $router->render('auth/confirmar', [
            'titulo' => 'Confirmar Cuenta'
        ]);
    }
}