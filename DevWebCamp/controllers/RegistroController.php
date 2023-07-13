<?php

namespace Controllers;

use Model\Evento;
use Model\Categoria;
use Model\Hora;
use Model\Dia;
use Model\EventoRegistro;
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

        if(isset($registro) && ($registro->paquete_id === "3" || $registro->paquete_id === "2")){
            header('Location: /boleto?id='.urlencode($registro->token));
            return;
        }
        if(isset($registro) && $registro->paquete_id === "1"){
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

            if(isset($registro) && ($registro->paquete_id === "3")){
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
                    'resultado' => 'error'
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
    public static function conferencias(Router $router){
        if(!isAuth()){
            header('Location: /login');
            return;
        }

        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);
       
        if(isset($registro) && $registro->paquete_id === "2"){
            header('Location: /boleto?id='.urlencode($registro->token));
            return;
        } 
         if(!isset($registro) || $registro->paquete_id !== "1"){
            header('Location: /');
            return;
        } 
        if ($registro->regalo_id !== "0") {
            header('Location: /boleto?id='.urlencode($registro->token));
            return;
        }

        $eventos = Evento::ordenar('hora_id', 'ASC'); 
        $eventosFormateados = [];

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if ($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "1") {
                $eventosFormateados['conferencias_d'][] = $evento;
            }    

            if ($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_v'][] = $evento;
            }    
            if ($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_s'][] = $evento;
            }    
            if ($evento->dia_id === "3" && $evento->categoria_id === "2") {
                $eventosFormateados['workshops_d'][] = $evento;
            }   
        }

        $regalos = Regalo::all('ASC');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAuth()){
                header('Location: /');
                return;
            }

            $eventos = explode(',', $_POST['eventos']);
            
            if (!$eventos) {
                echo json_encode(['resultado' => false]);
                return;
            }

            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if (!isset($registro) || $registro->paquete_id !== "1") {
                echo json_encode(['resultado' => false]);
                return;
            }

            $eventosArray = [];

            //revalidar disponibilidad
            foreach ($eventos as $evento_id) {
                $evento = Evento::find($evento_id);
                
                if (!isset($evento) || $evento->disponibles === "0") {
                    echo json_encode(['resultado' => false]);
                    return;
                }

                $eventosArray[] = $evento;
            }

            foreach ($eventosArray as $evento) {
                $evento->disponibles -= 1;
                $evento->guardar();

                $datos = [
                    'evento_id' => (int) $evento->id,
                    'registro_id' => (int) $registro->id
                ];

                 $registro_usuario = new EventoRegistro($datos);
                $registro_usuario->guardar(); 
            }

            //almacenar regalo
            $registro->sincronizar(['regalo_id' => $_POST['regalo_id']]);
            $resultado = $registro->guardar();

            if ($resultado) {
                echo json_encode([
                    'resultado' => $resultado, 
                    'token' => $registro->token
                ]);
            } else {
                echo json_encode(['resultado' => false]);
            }

            return;
        }

        $router->render('registro/conferencias', [
            'titulo' => 'Elige Workshops y Conferencias',
            'eventos' => $eventosFormateados,
            'regalos' => $regalos
        ]);
    }
}
