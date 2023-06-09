<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router) {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD' === 'POST']) {
            
        }

        $router->view('auth/login', [
            'errors' => $errors
        ]);
    }
    public static function logout() {
        echo "out";
    }
}