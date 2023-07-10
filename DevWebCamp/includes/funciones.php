<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
function pagina_actual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'] ?? '/',$path) ? true : false;
}
function isAuth() : bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function isAdmin() : bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function animacion() : void {
    $efectos = ['fade-up','fade-down','flip-left','flip-right','zoom-in','zoom-out'];
    $efecto = array_rand($efectos, 1);

    echo ' data-aos="'.$efectos[$efecto].'" ';
}