<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create(Router $router) {
        $seller = new Seller();
        $errors = Seller::getErrors();

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