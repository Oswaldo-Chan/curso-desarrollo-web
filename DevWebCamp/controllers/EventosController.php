<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Model\Ponente;

class EventosController {
    public static function index(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'] ?? '';
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $porPagina = 10;
        $total = Evento::total();
        $paginacion = new Paginacion($pagina_actual, $porPagina, $total);

        $eventos = Evento::paginar($porPagina, $paginacion->offset());

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        $router->render("admin/eventos/index", [ 
            "titulo" => "Conferencias & Workshops",
            "eventos" => $eventos,
            "paginacion" => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if (!isAdmin()) {
            header('Location: /login');
        }

        $alertas = [];
        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }
            
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render("admin/eventos/crear", [ 
            "titulo" => "Crear Evento",
            "alertas" => $alertas,
            "categorias" => $categorias,
            "dias" => $dias,
            "horas" => $horas,
            "evento" => $evento
        ]);
    }
    public static function editar(Router $router) {
        if (!isAdmin()) {
            header('Location: /login');
        }

        $alertas = [];
        $id = $_GET['id'] ?? '';
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/eventos');
        }

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = Evento::find($id);

        if (!$evento) {
            header('Location: /admin/eventos');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isAdmin()) {
                header('Location: /login');
            }

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();

                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render("admin/eventos/editar", [ 
            "titulo" => "Editar Evento",
            "alertas" => $alertas,
            "categorias" => $categorias,
            "dias" => $dias,
            "horas" => $horas,
            "evento" => $evento
        ]);
    }
    public static function eliminar(){
        if (!isAdmin()) {
            header('Location: /login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $evento = Evento::find($id);

            if (!isset($evento)) {
                header('Location: /admin/eventos');
            } 

            $resultado = $evento->eliminar();

            if ($resultado) {
                header('Location: /admin/eventos');
            }
        }
    }
}