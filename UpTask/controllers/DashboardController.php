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

        $router->render('dashboard/index', [
            'titulo' => 'Mis Proyectos'
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

        $router->render('dashboard/perfil', [
            'titulo' => 'Mi Perfil'
        ]);
    }
}