<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class EventosController {
    public static function index(Router $router){

        $router->render("admin/eventos/index", [ 
            "titulo" => "Conferencias & Workshops"
        ]);
    }
}