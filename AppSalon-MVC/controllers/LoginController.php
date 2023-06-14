<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

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
        
        $usuario = new Usuario;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    $usuario->hashPassword();
                    debuguear($usuario);
                }
            }
        }
        
        $router->view('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}