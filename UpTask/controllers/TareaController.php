<?php

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class TareaController {
    public static function index() {
        $proyectoId = $_GET['url'];

        if (!$proyectoId) {
            header('Location: /dashboard');
        }

        $proyecto = Proyecto::where('url', $proyectoId);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
            header('Location: /404');

        }

        $tareas = Tarea::belongsTo('proyectoId', $proyecto->id);
        
        echo json_encode(['tareas' => $tareas]);
    }
    public static function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $proyectoId = $_POST['proyectoId'];
            $proyecto = Proyecto::where('url', $proyectoId);
            
            if (!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al agregar la tarea'
                ];

                echo json_encode($respuesta);
                return;
            } 

            $tarea = new Tarea($_POST);
            $tarea->proyectoId = $proyecto->id;
            $resultado = $tarea->guardar();
            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Tarea Creada Exitosamente'
            ];

            echo json_encode($respuesta);
        }
    }
    public static function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
    }
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
    }
}