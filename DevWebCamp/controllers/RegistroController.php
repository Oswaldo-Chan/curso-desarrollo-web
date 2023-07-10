<?php

namespace Controllers;

use Model\Evento;
use Model\Categoria;
use Model\Hora;
use Model\Dia;
use Model\EventosRegistros;
use Model\Ponente;
use Model\Paquete;
use Model\Regalo;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistroController {
    public static function crear(Router $router) {

        if(!isAuth()){
            header('Location: /');
            return;
        }

        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if(isset($registro) && ($registro->paquete_id === '3' || $registro->paquete_id === '2')){
            header('Location: /boleto?id='.urlencode($registro->token));
            return;
        }
        if(isset($registro) && $registro->paquete_id === '1'){
            header('Location: /finalizar-registro/conferencias');
            return;
        }

        
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function gratis() {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isAuth()){
                header('Location: /');
                return;
            }
            
            $registro = Registro::where('usuario_id', $_SESSION['id']);

            if(isset($registro) && ($registro->paquete_id === '3' || $registro->paquete_id === '2')){
                header('Location: /boleto?id='.urlencode($registro->token));
                return;
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            $datos = [
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];

            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if($resultado){
                header('Location: /boleto?id='.urlencode($registro->token));
                return;
            }
        }
    }
    public static function pagar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isAuth()){
                header('Location: /');
                return;
            }

            if(empty($_POST)){
                echo json_encode([]);
                return;
            }

            $token =substr(md5(uniqid(rand(), true)), 0, 8);

            $datos = $_POST;
            $datos['token'] = $token;
            $datos['usuario_id'] = $_SESSION['id'];

            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultadoedq' => 'error'
                ]);
            }
        }
    }
    public static function boleto(Router $router){

        $id = $_GET['id'] ?? '';

        if(!$id || !strlen($id) === 8){
            header('Location: /');
            return;
        }

        $registro = Registro::where('token', $id);
        if(!$registro){
            header('Location: /');
            return;
        }

        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }
}
