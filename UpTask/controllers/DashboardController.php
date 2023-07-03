<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Proyecto;

class DashboardController {
    public static function index(Router $router) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();
        $id = $_SESSION['id'];

        $proyectos = Proyecto::belongsTo('propietarioId', $id);

        $router->render('dashboard/index', [
            'titulo' => 'Mis Proyectos',
            'proyectos' => $proyectos
        ]);
    }
    public static function crear(Router $router) {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);

            $alertas = $proyecto->validarProyecto();

            if(empty($alertas)) {
                $proyecto->url = md5(uniqid());
                $proyecto->propietarioId = $_SESSION['id'];
                $proyecto->guardar();

                header('Location: /proyecto?url='.$proyecto->url);
            }
        }

        $router->render('dashboard/crear', [
            'titulo' => 'Crear Proyecto',
            'alertas' => $alertas
        ]);
    }
    public static function proyecto(Router $router) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();
        $token = $_GET['url'];

        if (!$token) {
            header('Location: /dashboard');
        }

        $proyecto = Proyecto::where('url', $token);

        if ($proyecto->propietarioId !== $_SESSION['id']) {
            header('Location: /dashboard');
        }

        $router->render('dashboard/proyecto', [
            'titulo' => $proyecto->proyecto
        ]);
    }
    public static function perfil(Router $router) {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();
        $alertas = [];
        $usuario = Usuario::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarPerfil();

            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario && $existeUsuario->id !== $usuario->id) {
                    Usuario::setAlerta('error','El email ya está asociado a otra cuenta');
                    $alertas = $usuario->getAlertas();
                } else {
                    $usuario->guardar();
                    Usuario::setAlerta('exito','Guardado Correctamente');
                    $alertas = $usuario->getAlertas();
                    $_SESSION['nombre'] = $usuario->nombre;
                }
                
            }
        }

        $router->render('dashboard/perfil', [
            'titulo' => 'Mi Perfil',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function cambiarPassword(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        isAuth();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = Usuario::find($_SESSION['id']);
            $usuario->sincronizar($_POST);
            $alertas = $usuario->nuevoPassword();

            if (empty($alertas)) {
                $resultado = $usuario->comprobarPassword();
                
                if($resultado){
                    $usuario->password = $usuario->passwordNuevo;

                    unset($usuario->passwordActual);
                    unset($usuario->passwordNuevo);

                    $usuario->hashPassword();
                    $resultado = $usuario->guardar();

                    if($resultado){
                        Usuario::setAlerta("exito", "Password Guardado Correctamente");
                        $alertas = Usuario::getAlertas();
                    }
                } else {
                    Usuario::setAlerta("error", "Password Actual Incorrecto");
                    $alertas = Usuario::getAlertas();
                }
            }
        }
        
        $router->render('dashboard/cambiar-password', [
            'titulo' => 'Cambiar Password',
            'alertas' => $alertas
        ]);
    }
}