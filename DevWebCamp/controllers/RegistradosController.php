<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class RegistradosController {
    public static function index(Router $router){

        $router->render("admin/registrados/index", [ 
            "titulo" => "Usuarios Registrados"
        ]);
    }
}