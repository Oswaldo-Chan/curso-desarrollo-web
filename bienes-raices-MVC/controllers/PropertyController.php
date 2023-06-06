<?php

namespace Controllers;
use MVC\Router;

class PropertyController {
    public static function index(Router $router) {
        $router->view('properties/admin', [
            'message' => 'desde la vista',
            'properties' => 'Casa'
        ]);
    }

    public static function create() {
        
    }

    public static function update() {
        
    }
}