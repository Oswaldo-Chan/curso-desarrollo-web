<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;

class LoginController {
    public static function login(Router $router) {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);

                if (!$usuario || !$usuario->confirmado) {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                } else {
                    if (password_verify($_POST['password'], $usuario->password)) {
                       
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre." ".$usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        header('Location: /dashboard');
                    } else {
                        Usuario::setAlerta('error', 'El password es incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
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
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);
                
                if($usuario && $usuario->confirmado) {
                    $usuario->crearToken();
                    unset($usuario->password2);
                    $usuario->guardar();
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token); 
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide', [
            'titulo' => 'Recuperar Acceso',
            'alertas' => $alertas
        ]);
    }
    public static function restablecer(Router $router) {        
        if(!$_GET['token']){
            header('Location: /');
        }

        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);
        $mostrar = true;

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token Inválido');
            $mostrar = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarPassword();

            if(empty($alertas)) {
                $usuario->hashPassword();
                unset($usuario->password2);
                $usuario->token = "";
                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/restablecer', [
            'titulo' => 'Restablecer Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }
    public static function mensaje(Router $router) {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }
    public static function confirmar(Router $router) {
        
        if(!$_GET['token']){
            header('Location: /');
        }

        $token = s($_GET['token']);
        
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