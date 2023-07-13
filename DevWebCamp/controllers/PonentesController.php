<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    public static function index(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }
        
        $paginaActual = $_GET['page'] ?? '';
        $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);
        
        if (!$paginaActual || $paginaActual < 1) {
            header('Location: /admin/ponentes?page=1');
        }
        
        $registrosPorPagina = 8;
        $total = Ponente::total();
        $paginacion = new Paginacion($paginaActual,$registrosPorPagina,$total);
        
        if ($paginacion->totalPaginas() < $paginaActual) {
            header('Location: /admin/ponentes?page=1');
        }

        $ponentes = Ponente::paginar($registrosPorPagina, $paginacion->offset());

        $router->render("admin/ponentes/index", [ 
            "titulo" => "Ponentes / Conferencias",
            "ponentes" => $ponentes,
            "paginacion" => $paginacion->paginacion()
        ]);
    }
    public static function crear(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }

        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }

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
            "ponente" => $ponente,
            "redes" => json_decode($ponente->redes)
        ]);
    }
    public static function editar(Router $router){
        if (!isAdmin()) {
            header('Location: /login');
        }

        $alertas = [];
        
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/ponentes');
        }
        
        $ponente = Ponente::find($id);

        if (!$ponente) {
            header('Location: /admin/ponentes');
        }

        $ponente->imagenActual = $ponente->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }

            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta = '../public/img/speakers';

                if (!is_dir($carpeta)) {
                    mkdir($carpeta, 0755, true);
                }

                $imagenPNG = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagenWEBP = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);

                $nombreImagen = md5(uniqid(rand(),true));

                $_POST['imagen'] = $nombreImagen;
            } else {
                $_POST['imagen'] = $ponente->imagenActual;
            }
            $_POST['redes'] = json_encode($_POST['redes'],JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {
                if (isset($nombreImagen)) {
                    $imagenPNG->save($carpeta.'/'.$nombreImagen.'.png');
                    $imagenWEBP->save($carpeta.'/'.$nombreImagen.'.webp');
                }

                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render("admin/ponentes/editar", [ 
            "titulo" => "Editar Ponente",
            "alertas" => $alertas,
            "ponente" => $ponente,
            "redes" => json_decode($ponente->redes)
        ]);
    }

    public static function eliminar(){
        if (!isAdmin()) {
            header('Location: /login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAdmin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            if (!isset($ponente)) {
                header('Location: /admin/ponentes');
            } 

            $resultado = $ponente->eliminar();

            if ($resultado) {
                header('Location: /admin/ponentes');
            }
        }
    }
}