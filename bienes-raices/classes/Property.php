<?php

namespace App;

class Property {
    //database
    protected static $db;

    private $id;
    private $title;
    private $price;
    private $image;
    private $description;
    private $rooms;
    private $wc;
    private $parking;
    private $date;
    private $seller;

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
        $this->date = date('Y/m/d');
        $this->seller = $args['vendedores_id'] ?? '';
    }

    //getters and setters

    public function getID() : string {
        return $this->id;
    }
    public function getTitle() : string {
        return $this->id;
    }
    public function getPrice() : string {
        return $this->id;
    }
    public function getImage() : string {
        return $this->id;
    }
    public function getDescription() : string {
        return $this->id;
    }
    public function getRooms() : string {
        return $this->id;
    }
    public function getWC() : string {
        return $this->id;
    }
    public function getParking() : string {
        return $this->id;
    }
    public function getDate() : string {
        return $this->id;
    }
    public function getSeller() : string {
        return $this->id;
    }
    public static function setDB($db) {
        self::$db = $db;
    }

    //functions
    public function save() {
        //insert to db
        $query = " INSERT INTO propiedades (nombre, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)";
        $query .= " VALUES ('$this->title', '$this->price', '$this->image', '$this->description', '$this->rooms', '$this->wc', '$this->parking', '$this->date', '$this->seller')";  
       
        $result = self::$db->query($query);

        debug($result);
   }
} 