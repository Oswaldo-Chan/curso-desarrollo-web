<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;

class PropertyController {
    public static function index(Router $router) {

        $properties = Property::all();
        $result = null;

        $router->view('properties/admin', [
            'properties' => $properties,
            'result' => $result
        ]);
    }

    public static function create(Router $router) {
        $property = new Property;
        $sellers = Seller::all();

        $router->view('properties/create', [
            'property' => $property,
            'sellers' => $sellers
        ]);
    }

    public static function update(Router $router) {
                $router->view('properties/update', [
            
        ]);
    }
}