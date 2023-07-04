<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    public static function index(Router $router){

        $router->render("admin/ponentes/index", [ 
            "titulo" => "Ponentes / Conferencias"
        ]);
    }
    public static function crear(Router $router){
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta = '../public/img/speakers';

                if (!is_dir($carpeta)) {
                    mkdir($carpeta, 0755, true);
                }

                $imagenPNG = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagenWEBP = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);

                $nombreImagen = md5(uniqid(rand(),true));

                $_POST['imagen'] = $nombreImagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'],JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                $imagenPNG->save($carpeta.'/'.$nombreImagen.'.png');
                $imagenWEBP->save($carpeta.'/'.$nombreImagen.'.webp');
            
                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render("admin/ponentes/crear", [ 
            "titulo" => "Registrar Ponente",
            "alertas" => $alertas,
            "ponente" => $ponente
        ]);
    }
}