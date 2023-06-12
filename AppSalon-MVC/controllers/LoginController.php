<?php

namespace Controllers;

class LoginController {
    public static function login() {
        echo "Desde Login";
    }
    public static function logout() {
        echo "Desde Logout";
    }
    public static function passwordOlvidado() {
        echo "Desde olvidado";
    }
    public static function recuperarPassword() {
        echo "Desde recuperar";
    }
    public static function crearCuenta() {
        echo "Desde crear";
    }
}