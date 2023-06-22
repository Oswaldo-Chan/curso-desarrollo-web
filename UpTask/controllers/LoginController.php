<?php

namespace Controllers;

class LoginController {
    public static function login() {
        echo "desde login";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function logout() {
        echo "desde logout";
    }
    public static function crear() {
        echo "desde crear";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function olvide() {
        echo "desde olvide";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function restablecer() {
        echo "desde restablecer";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            # code...
        }
    }
    public static function mensaje() {
        echo "desde mensaje";
    }
    public static function confirmar() {
        echo "desde confirmar";
    }
}