<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController {
    public static function index(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $servicios = Servicio::all();

        $router->view('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }
    public static function crear(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $servicio = new Servicio;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->view('servicios/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
    public static function actualizar(Router $router) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_GET['id'];
        if (!is_numeric($id)) return;
        $servicio = Servicio::find($id);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->view('servicios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
}