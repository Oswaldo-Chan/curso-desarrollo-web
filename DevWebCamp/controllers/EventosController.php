<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

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

        $router->render("admin/eventos/crear", [ 
            "titulo" => "Crear Evento",
            "alertas" => $alertas
        ]);
    }
}