<?php

namespace App;

class Property {
    //database
    protected static $db;
    protected static $dbColumns = ['id','nombre','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

    protected static $errors = [];

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
    public static function getErrors() {
        return self::$errors;
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
/*         $size = 1000 * 1000;
        if (!$this->image['name'] || $this->image['error']) {
            self::$errors[] = "La imagen es obligatoria";
        } else if($this->image['size'] > $size){
            self::$errors[] = "El tamaño de la imagen pesa demasiado";
        } */

        return self::$errors;
    }
} 