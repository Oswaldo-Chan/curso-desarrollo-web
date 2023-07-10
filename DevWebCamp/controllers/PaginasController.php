<?php

namespace Controllers;

use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Model\Ponente;
use Model\Dia;
use Model\Hora;

class PaginasController {
    public static function index(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC'); 
        $eventosFormateados = [];

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if ($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_d'][] = $evento;
            }    

            if ($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_d'][] = $evento;
            }   
        }   

        $ponentesTotal = Ponente::total();
        $conferenciasTotal = Evento::total('categoria_id', 1);
        $workshopsTotal = Evento::total('categoria_id', 2);

        $ponentes = Ponente::all();

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventosFormateados,
            'ponentesTotal' => $ponentesTotal,
            'conferenciasTotal' => $conferenciasTotal,
            'workshopsTotal' => $workshopsTotal,
            'ponentes' => $ponentes
        ]);
    }
    public static function evento(Router $router) {

        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }
    public static function paquetes(Router $router) {

        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes DevWebCamp'
        ]);
    }
    public static function conferencias(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC'); 
        $eventosFormateados = [];

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if ($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_d'][] = $evento;
            }    

            if ($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_d'][] = $evento;
            }   
        }   

        $router->render('paginas/conferencias', [
            'titulo' => 'Workshops & Conferencias',
            'eventos' => $eventosFormateados
        ]);
    }
    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }
}