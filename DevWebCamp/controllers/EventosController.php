<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Usuario;
use Model\Categoria;

class EventosController {
    public static function index(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }
        
        $router->render("admin/eventos/index", [ 
            "titulo" => "Conferencias & Workshops"
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
        
        $router->render("admin/eventos/crear", [ 
            "titulo" => "Crear Evento",
            "alertas" => $alertas,
            "categorias" => $categorias,
            "dias" => $dias,
            "horas" => $horas
        ]);
    }
}