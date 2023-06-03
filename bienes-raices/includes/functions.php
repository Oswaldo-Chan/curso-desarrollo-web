<?php 


define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCTIONS_URL', __DIR__.'functions.php');
define('FOLDER_IMG',__DIR__.'/../img/');

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