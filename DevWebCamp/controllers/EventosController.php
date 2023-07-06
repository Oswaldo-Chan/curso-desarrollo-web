<?php

namespace Controllers;

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
        $categorias = Categoria::all();

        $router->render("admin/eventos/crear", [ 
            "titulo" => "Crear Evento",
            "alertas" => $alertas,
            "categorias" => $categorias
        ]);
    }
}