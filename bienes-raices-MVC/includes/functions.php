<?php 

define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCTIONS_URL', __DIR__.'functions.php');
define('FOLDER_IMG',$_SERVER['DOCUMENT_ROOT'].'/img/');

function includeTemplate(string $template, bool $inicio = false) {
    include TEMPLATES_URL."/{$template}.php";
}

function userAuth() {
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    } 
}

function debug($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

function sanitize($html) : string {
    $sanitized = htmlspecialchars($html);
    return $sanitized;
}

function validateTypeContent($type) {
    $types = ['seller','property'];

    return in_array($type, $types);
}

function showAlert($code){
    $message = '';

    switch ($code) {
        case 1:
            $message = "Creado Correctamente";
            break;
        case 2:
            $message = "Actualizado Correctamente";
            break;
        case 2:
            $message = "Eliminado Correctamente";
            break;
        default:
            $message = false;
            break;
    }

    return $message;
}