<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController {
    public static function index(Router $router) {
        $properties = Property::all();
        $result = $_GET['result'] ?? null;

        $router->view('properties/admin', [
            'properties' => $properties,
            'result' => $result
        ]);
    }

    public static function create(Router $router) {
        $property = new Property;
        $sellers = Seller::all();
        $errors = Property::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $property = new Property($_POST['property']);
    
            $imageName = md5(uniqid(rand(), true)).".jpg";
    
            if ($_FILES['property']['tmp_name']["image"]) {
                $image = Image::make($_FILES['property']['tmp_name']["image"])->fit(800, 600);
                $property->setImage($imageName);
            }
    
            $errors = $property->validate();
            
            if (empty($errors)) {
    
                if (!is_dir(FOLDER_IMG)) {
                    mkdir(FOLDER_IMG);
                }
    
                $image->save(FOLDER_IMG.$imageName);
                $property->save();
            }
        }

        $router->view('properties/create', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router) {
                $router->view('properties/update', [
            
        ]);
    }
}