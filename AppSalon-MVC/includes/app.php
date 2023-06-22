<?php 
require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Mexico_City');  

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
use Model\ActiveRecord;
ActiveRecord::setDB($db);