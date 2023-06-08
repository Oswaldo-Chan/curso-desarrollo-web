<?php

namespace Controllers;

use MVC\Router;
use Model\Seller;
use Model\Article;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $replies = $_POST['contact'];

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'ae51157c559c16';
            $mail->Password = '9de6c97bef4d6d';
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', "BienesRaices.com");
            $mail->Subject = "Tiene un nuevo mensaje";
            
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            $content = '<html>';
            $content .= '<p>Tiene Un Nuevo Mensaje</p>';
            $content .= '<p>Nombre: '.$replies['name'].'</p>';
            $content .= '<p>Email: '.$replies['email'].'</p>';
            $content .= '<p>Teléfono: '.$replies['phone'].'</p>';
            $content .= '<p>Mensaje: '.$replies['message'].'</p>';
            $content .= '<p>Vende o Compra: '.$replies['type'].'</p>';
            $content .= '<p>Precio o Presupuesto: $'.$replies['price'].'</p>';
            $content .= '<p>Prefiere ser contactado por: '.$replies['contact'].'</p>';
            $content .= '<p>Fecha: '.$replies['date'].'</p>';
            $content .= '<p>Hora: '.$replies['hour'].'</p>';
            $content .= '</html>';
            
            $mail->Body = $content;
            $mail->AltBody = "Texto alternativo sin HTML";

            if ($mail->send()) {
                echo  "Mensaje enviado correctamente";
            } else {
                echo "El mensaje no se pudo enviar";
            }

        }
        $router->view('pages/contact', [

        ]);
    }
}