<?php

namespace Model;

#[\AllowDynamicProperties] //permite la creacion dinamica de propiedades
class Regalo extends ActiveRecord {
    protected static $tabla = 'regalos';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';

    }
}