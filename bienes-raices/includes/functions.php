<?php 

require 'app.php';

function includeTemplate(string $template, bool $inicio = false) {
    include TEMPLATES_URL."/{$template}.php";
}

function userAuth() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }

    return false;
}