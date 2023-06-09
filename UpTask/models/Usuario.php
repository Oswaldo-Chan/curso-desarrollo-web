<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','email','password','token','confirmado'];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $password2;
    public $passwordActual;
    public $passwordNuevo;
    public $token;
    public $confirmado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->passwordActual = $args['passwordActual'] ?? '';
        $this->passwordNuevo = $args['passwordNuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
    }

    public function validarLogin() {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email es inválido'; 
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        
        return self::$alertas;
    }
    public function validarNuevaCuenta() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email es inválido'; 
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        } else if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        } else if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los passwords no coinciden';
        }

        return self::$alertas;
    }
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio'; 
        } else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email es inválido'; 
        }

        return self::$alertas;
    }
    public function validarPassword() {
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        } else if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        } else if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los passwords no coinciden';
        }

        return self::$alertas;
    }
    public function validarPerfil() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email es inválido'; 
        }

        return self::$alertas;
    }
    public function nuevoPassword() {
        if (!$this->passwordActual) {
            self::$alertas['error'][] = 'El password actual es obligatorio';
        } 
        if (!$this->passwordNuevo) {
            self::$alertas['error'][] = 'El nuevo password es obligatorio';
        } else if (strlen($this->passwordNuevo) < 6) {
            self::$alertas['error'][] = 'El nuevo password debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }
    public function comprobarPassword() : bool {
        return password_verify($this->passwordActual, $this->password);
    }
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken() {
        $this->token = md5(uniqid());
    }
}