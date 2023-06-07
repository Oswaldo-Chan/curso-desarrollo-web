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
        $properties = Property::all();

        $router->view('pages/properties', [
            'properties' => $properties
        ]);
    }
    public static function property(Router $router) {
        $id = validateOrRedirect('/properties');
        $property = Property::find($id);

        $router->view('pages/property', [
            'property' => $property
        ]);
    }
    public static function blog(Router $router) {
        
    }
    public static function article(Router $router) {
        
    }
    public static function contact(Router $router) {
        
    }
}