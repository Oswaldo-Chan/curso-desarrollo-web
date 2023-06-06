<?php

namespace Controllers;
use MVC\Router;

class PropertyController {
    public static function index(Router $router) {
        $router->view('properties/admin');
    }

    public static function create() {
        
    }

    public static function update() {
        
    }
}