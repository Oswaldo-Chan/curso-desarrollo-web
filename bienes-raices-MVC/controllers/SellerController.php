<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create(Router $router) {
        $seller = new Seller();
        $errors = Seller::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seller = new Seller($_POST['seller']);
            $errors = $seller->validate();
    
            if (empty($errors)) {
                $seller->save();
            }
        }

        $router->view('sellers/create', [
            'seller' => $seller,
            'errors' => $errors
        ]);
    }
    public static function update() {

    }
    public static function delete() {

    }
}