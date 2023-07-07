<?php

namespace Controllers;

use Model\Ponente;

class APIPonentesController {
    public static function index() {
        $ponentes = Ponente::all();
        echo json_encode($ponentes);
    }
}