<?php

namespace Model;

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
        $this->seller = $args['seller'] ?? '';
    }

    public function validate(){
    
        if (!$this->title) {
            self::$errors[] = "Debes agregar un titulo";
        }
        if (!$this->price) {
            self::$errors[] = "El precio es obligatorio";
        }
        if (!$this->description) {
            self::$errors[] = "Necesitas agregar una descripcion";
        } else if (strlen($this->description) < 20) {
            self::$errors[] = "La descripcion debe tener al menos 20 caracteres";
        } else if (strlen($this->description) > 200) {
            self::$errors[] = "La descripcion no debe exceder los 200 caracteres";
        }
        if (!$this->rooms) {
            self::$errors[] = "El numero de habitaciones es obligatorio";
        }
        if (!$this->wc) {
            self::$errors[] = "El numero de baños es obligatorio";
        }
        if (!$this->parking) {
            self::$errors[] = "El numero de lugares de estacionamiento es obligatorio";
        }
        if (!$this->seller) {
            self::$errors[] = "Elige un vendedor";
        }
        if (!$this->image) {
            self::$errors[] = "La imagen es obligatoria";
        }

        return self::$errors;
    }
    protected static function getPropertyForColumn($column) {
        switch ($column) {
            case 'id':
                return 'id';
            case 'nombre':
                return 'title';
            case 'precio':
                return 'price';
            case 'imagen':
                return 'image';
            case 'descripcion':
                return 'description';
            case 'habitaciones':
                return 'rooms';
            case 'wc':
                return 'wc';
            case 'estacionamiento':
                return 'parking';
            case 'creado':
                return 'date';
            case 'vendedores_id':
                return 'seller';
            default:
                return null;
        }
    }
} 