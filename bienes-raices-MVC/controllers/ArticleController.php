<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;
use Model\Article;
use Intervention\Image\ImageManagerStatic as Image;

class ArticleController {
    public static function create(Router $router) {
        $article = new Article();
        $sellers = Seller::all();
        $errors = Article::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $article = new Article($_POST['article']);
            $imageName = md5(uniqid(rand(), true)).".jpg";
    
            if ($_FILES['article']['tmp_name']["image"]) {
                $image = Image::make($_FILES['article']['tmp_name']["image"])->fit(800, 600);
                $article->setImage($imageName);
            }
    
            $errors = $article->validate();
            
            if (empty($errors)) {
    
                if (!is_dir(FOLDER_IMG)) {
                    mkdir(FOLDER_IMG);
                }
    
                $image->save(FOLDER_IMG.$imageName);
                $article->save();
            }
        }

        $router->view('blog/create', [
            'article' => $article,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }
    public static function update(Router $router) {
        $id = validateOrRedirect('/admin');
        $article = Article::find($id);
        $sellers = Seller::all();
        $errors = Article::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['article'];
            $article->sync($args);
            $errors = $article->validate();
            $imageName = md5(uniqid(rand(), true)).".jpg";
    
            if ($_FILES['article']['tmp_name']["image"]) {
                $image = Image::make($_FILES['article']['tmp_name']["image"])->fit(800, 600);
                $article->setImage($imageName);
            }
           
            if (empty($errors)) {   
                if ($_FILES['article']['tmp_name']["image"]) {
                $image->save(FOLDER_IMG.$imageName);
                }
                
                $article->save();
            }
        }    

        $router->view('blog/update', [
            'article' => $article,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }
    public static function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $type = $_POST['type'];
    
                if (validateTypeContent($type)) {
                    $article = Article::find($id);
                    $article->delete();
                }
            }
        }    
    }
}