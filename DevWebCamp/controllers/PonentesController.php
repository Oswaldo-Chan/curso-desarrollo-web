<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class PonentesController {
    public static function index(Router $router){

        $router->render("admin/ponentes/index", [ 
            "titulo" => "Ponentes / Conferencias"
        ]);
    }
    public static function crear(Router $router){
        $alertas = [];

        $router->render("admin/ponentes/crear", [ 
            "titulo" => "Registrar Ponente",
            "alertas" => $alertas
        ]);
    }
}