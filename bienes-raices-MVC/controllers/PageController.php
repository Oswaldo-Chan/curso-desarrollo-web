<?php

namespace Controllers;

use MVC\Router;
use Model\Property;

class PageController {
    public static function index(Router $router) {
        $properties = Property::get(3);

        $router->view('pages/index', [
            'inicio' => true,
            'properties' => $properties
        ]);
    }
    public static function about_us() {
        
    }
    public static function properties() {
        
    }
    public static function property() {
        
    }
    public static function blog() {
        
    }
    public static function article() {
        
    }
    public static function contact() {
        
    }
}