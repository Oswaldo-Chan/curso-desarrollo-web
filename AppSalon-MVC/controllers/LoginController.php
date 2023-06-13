<?php

namespace Controllers;

use MVC\Router;

class LoginController {
    public static function login(Router $router) {

        $router->view('auth/login');
    }
    public static function logout() {
        echo "Desde Logout";
    }
    public static function passwordOlvidado(Router $router) {
        
        $router->view('auth/password-olvidado', [
            
        ]);
    }
    public static function recuperarPassword() {
        echo "Desde recuperar";
    }
    public static function crearCuenta(Router $router) {
        
        $router->view('auth/crear-cuenta', [
            
        ]);
    }
}