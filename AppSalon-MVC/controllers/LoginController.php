<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
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
                    $usuario->crearToken();
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
        
        $router->view('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router) {
        $router->view('auth/mensaje');
    }
    public static function confirmar(Router $router) {
        $alertas = [];
        $token = sanitizar($_GET['token']);
        $usuario = Usuario::where('token',$token);
        debuguear($usuario);
        $router->view('auth/confirmr-cuenta', [
            'alertas' => $alertas
        ]);
    }
}