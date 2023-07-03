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
    return str_contains($_SERVER['PATH_INFO'],$path) ? true : false;
}
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}