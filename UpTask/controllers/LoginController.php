<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;

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
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);
            
                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El usuario ya existe');
                    $alertas = Usuario::getAlertas();
                } else {
                    $usuario->hashPassword();
                    unset($usuario->password2);
                    $usuario->crearToken();
                    $resultado = $usuario->guardar();

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/crear', [
            'titulo' => 'Crear Cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
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
        $token = s($_GET['token']);

        if(!$token) header('Location: /');

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token Inválido');
        } else {
            $usuario->confirmado = "1";
            $usuario->token = "";
            unset($usuario->password2);
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Confirmada');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirmar Cuenta',
            'alertas' => $alertas
        ]);
    }
}