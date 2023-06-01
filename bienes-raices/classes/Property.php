<?php

namespace App;

class Property {
    //database
    protected static $db;
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
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? 'imagen.jpg';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->date = date('Y/m/d');
        $this->seller = $args['vendedores_id'] ?? '';
    }

    //getters and setters
    public static function setDB($db) {
        self::$db = $db;
    }

    //methods
    public function save() {
        $attributes = $this->sanitizeAttributes();

        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ')";
        $result = self::$db->query($query);

        debug($result);
   }

   public function attributes() {
        $attributes = [];

        foreach(self::$dbColumns as $column) {
            if($column === 'id') continue;
            $propertyName = $this->getPropertyForColumn($column);
            $attributes[$column] = $this->$propertyName;
        }
        return $attributes;
   }

   public function sanitizeAttributes() {
        $attributes = $this->attributes();
        $sanitized = [];

        foreach($attributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
   }

   protected function getPropertyForColumn($column) {
        switch ($column) {
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