<?php include 'includes/header.php';

function userAuth(bool $auth) : string { //debe retornar un string
    if ($auth) {
        return "Usuario Autenticado";
    } else {
        return "Usuario No Autenticado";
    }
}

function imprimir($dato) : void {
    echo $dato;
}

$user = userAuth(true);
imprimir($user);

function funcion(bool $b) :string|int {
    if($b){
        return "hola";
    } else {
        return true;
    }
}

include 'includes/footer.php';