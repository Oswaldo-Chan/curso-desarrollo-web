<?php

namespace Model;

class Cita extends ActiveRecord {
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','usuarioId','fecha','hora'];

    public $id;
    public $usuarioId;
    public $fecha;
    public $hora;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }
}

