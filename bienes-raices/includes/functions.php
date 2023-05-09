<?php 

require 'app.php';

function includeTemplate(string $template, bool $inicio = false) {
    include TEMPLATES_URL."/{$template}.php";
}