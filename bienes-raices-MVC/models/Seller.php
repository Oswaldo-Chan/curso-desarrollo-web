<?php

namespace Model;

class Seller extends ActiveRecord{
    protected static $table = 'vendedores';
    protected static $dbColumns = ['id','name','apellido','telefono'];

    public $id;
    public $name;
    public $surname;
    public $phone;

    public function __construct($args = [])
    {  
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    
    }
    public function validate(){
    
        if (!$this->name) {
            self::$errors[] = "Debes agregar un nombre";
        }
        if (!$this->surname) {
            self::$errors[] = "El apellido es obligatorio";
        }
        if (!$this->phone) {
            self::$errors[] = "Necesitas agregar telefono";
        } 
        if (!preg_match('/[0-9]{10}/',$this->phone)) {
            self::$errors[] = "El telefono es invalido";

        }
        return self::$errors;
    }   
    protected static function getPropertyForColumn($column) {
        switch ($column) {
            case 'id':
                return 'id';
            case 'name':
                return 'name';
            case 'apellido':
                return 'surname';
            case 'telefono':
                return 'phone';
            default:
                return null;
        }
    }
}