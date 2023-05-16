<?php 

require 'app.php';

function includeTemplate(string $template, bool $inicio = false) {
    include TEMPLATES_URL."/{$template}.php";
}

function userAuth() : bool {
    session_start();

    if (isset($_SESSION['login']) && $_SESSION['login']) {
        return true;
    }
    
    return false;
}