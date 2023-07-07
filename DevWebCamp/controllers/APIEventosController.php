<?php

namespace Controllers;

use Model\EventoHorario;

class APIEventosController {
    public static function index() {
        $categoria_id = $_GET['categoria_id'] ?? '';
        $dia_id = $_GET['dia_id'] ?? '';

        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);
        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        
        if(!$dia_id || !$categoria_id) {
            echo json_encode([]);
            return;
        }

        $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];
        echo json_encode($eventos);
    }
}