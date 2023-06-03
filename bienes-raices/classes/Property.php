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
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->date = date('Y/m/d');
        $this->seller = $args['vendedores_id'] ?? 1;
    }

    //getters and setters
    public static function setDB($db) {
        self::$db = $db;
    }
    public function setImage($image){

        if ($this->id) {
            $this->deleteImage();
        }

        if ($image) {
            $this->image = $image;
        }
    }
    public static function getErrors() {
        return self::$errors;
    }

    //methods
    public function save() {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->create();
        }
    }
    protected function create() {
        $attributes = $this->sanitizeAttributes();

        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($attributes));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ')";
        $result = self::$db->query($query);

        return $result;
   }
   protected function update() {
        $attributes = $this->sanitizeAttributes();

        $values = [];
        foreach ($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }
        join(', ', $values);
        $query = "UPDATE propiedades SET ";
        $query.= join(', ', $values);
        $query.= " WHERE id = '".self::$db->escape_string($this->id)."' ";
        $query.= "LIMIT 1";

        $result = self::$db->query($query);

        if ($result) {
            header('Location: /admin?result=2');
        }
    }
    public function delete() {
        //delete property
        $query = "DELETE FROM propiedades WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        
        $result = self::$db->query($query);

        if ($result) {
            $this->deleteImage();
            header('Location: /admin');
        }
    }
    public function deleteImage(){
        $exists = file_exists(FOLDER_IMG.$this->image);

        if ($exists) {
            unlink(FOLDER_IMG.$this->image);
        }
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
    public static function all() {
        $query = "SELECT * FROM propiedades";

        $result = self::SQLQuery($query);

        return $result;
    }
    public static function find($propertyID) {
        $query = "SELECT * FROM propiedades WHERE id = {$propertyID}";
        $result = self::SQLQuery($query);

        return array_shift($result);
    }
    public static function SQLQuery($query) {
        $result = self::$db->query($query);
        $array = [];
        while ($record = $result->fetch_assoc()) {
            $array[] = self::createObject($record);
        }
        $result->free();
        return $array;
    }
    protected static function createObject($record) {
        $object = new self;
    
        foreach ($record as $key => $value) {
            $propertyName = self::getPropertyForColumn($key);
            if (property_exists($object, $propertyName)) {
                $object->$propertyName = $value;
            }
        }

        return $object;
    }
    public function sync($args = []) {
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
} 