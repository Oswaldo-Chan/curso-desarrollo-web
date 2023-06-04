<?php

namespace App;

class Property extends ActiveRecord {
    protected static $table = 'propiedades';
    protected static $dbColumns = ['id','nombre','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

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
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->date = date('Y/m/d');
        $this->seller = $args['vendedores_id'] ?? '';
    }
} 