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
}