<?php

namespace App;

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
}