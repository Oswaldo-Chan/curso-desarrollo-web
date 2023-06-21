<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function sanitizar($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isAuth() : void {
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}