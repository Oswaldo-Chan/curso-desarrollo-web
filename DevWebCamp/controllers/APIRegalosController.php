<?php

namespace Controllers;

use Model\Regalo;
use Model\Registro;

class APIRegalosController {
    public static function index() {

        if (!isAdmin()) {
            echo json_encode([]);
            return;
        }
        
        $regalos = Regalo::all();
        $regalosFormateados = [];

        foreach ($regalos as $regalo) {
            if ($regalo->id !== "0") {
                $regalosFormateados[] = $regalo;
            }
        }

        foreach ($regalosFormateados as $regalo) {
            $regalo->total = Registro::totalArray(['regalo_id' => $regalo->id, 'paquete_id' => "1"]);
        }
        echo json_encode($regalosFormateados);
        return;
    }
}