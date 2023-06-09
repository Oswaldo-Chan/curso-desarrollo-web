<?php

namespace Model;

class Admin extends ActiveRecord {
    protected static $table = 'usuarios';
    protected static $dbColumns = ['id','nombre','apellido','email','password'];
    
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;

    public function __construct($args = [])
    {  
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password  = $args['password'] ?? '';
    
    }
    public function validate(){
        if (!$this->email) {
            self::$errors[] = "El email es obligatorio";
        } 
        if (!$this->password) {
            self::$errors[] = "La contraseña es obligatoria";
        }
        return self::$errors;
    }   
    protected static function getPropertyForColumn($column) {
        switch ($column) {
            case 'id':
                return 'id';
            case 'nombre':
                return 'name';
            case 'apellido':
                return 'surname';
            case 'email':
                return 'email';
            case 'password':
                return 'password';
            default:
                return null;
        }
    }
}
