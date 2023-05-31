<?php

namespace App;

class Property {
    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $date;
    public $seller;

    public function __construct($args = [])
    {
        
        $this->id = $args['id'] ?? '';
        $this->title = $args['nombre'] ?? '';
        $this->price = $args['precio'] ?? '';
        $this->image = $args['imagen'] ?? '';
        $this->description = $args['descripcion'] ?? '';
        $this->rooms = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['estacionamiento'] ?? '';
        $this->date = $args['creado'] ?? '';
        $this->seller = $args['vendedores_id'] ?? '';
    }
}