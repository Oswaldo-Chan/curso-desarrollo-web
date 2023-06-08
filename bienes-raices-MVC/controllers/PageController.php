<?php

namespace Controllers;

use MVC\Router;
use Model\Seller;
use Model\Article;
use Model\Property;

class PageController {
    public static function index(Router $router) {
        $properties = Property::get(3);
        $blog = Article::get(2);
        $sellers = Seller::all();

        $router->view('pages/index', [
            'inicio' => true,
            'properties' => $properties,
            'blog' => $blog,
            'sellers' => $sellers
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
        $blog = Article::all();
        $sellers = Seller::all();

        $router->view('pages/blog', [
            'blog' => $blog,
            'sellers' => $sellers
        ]);
    }
    public static function article(Router $router) {
        $id = validateOrRedirect('/blog');
        $article = Article::find($id);
        $sellers = Seller::all();

        $router->view('pages/article', [
            'article' => $article,
            'sellers' => $sellers
        ]);
    }
    public static function contact(Router $router) {
        
    }
}