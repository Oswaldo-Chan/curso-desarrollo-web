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
    public static function about_us(Router $router) {
        $router->view('pages/about-us');
    }
    public static function properties(Router $router) {
 
    }
    public static function property(Router $router) {
        
    }
    public static function blog(Router $router) {
        
    }
    public static function article(Router $router) {
        
    }
    public static function contact(Router $router) {
        
    }
}