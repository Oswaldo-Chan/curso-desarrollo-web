<?php

namespace Controllers;

use Model\Usuario;
use Model\Registro;
use Model\Evento;
use MVC\Router;

class DashboardController {
    public static function index(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }
        
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);

        $menosDisponibles = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $masDisponibles = Evento::ordenarLimite('disponibles', 'DESC', 5);
        
        $router->render("admin/dashboard/index", [ 
            "titulo" => "Panel de Administración",
            "registros" => $registros,
            "ingresos" => $ingresos,
            "menosDisponibles" => $menosDisponibles,
            "masDisponibles" => $masDisponibles
        ]);
    }
}