<?php include 'includes/header.php';

//funciones
$name = "   Oswaldo Chan   ";

echo strlen($name); //numero de caracteres

$text = trim($name); //elimina espacios en blanco al inicio y final
echo strlen($text);

//convertir a mayusculas o minusculas
echo strtoupper($text);
echo strtolower($text);

$email = "correo@correo.com";
$_email = "CorreO@correo.com";

var_dump(strtolower($email) === strtolower($_email));

//reemplaza
echo str_replace('Oswaldo','O',$name);

//revisar si un string existe o no
echo strpos($name, 'Oswaldo');

//concatenar
$tipoCliente = "Premium";
echo "El cliente".$name."es ".$tipoCliente;

echo "{$name} es un cliente {$tipoCliente}"; //solo funciona con comillas dobles 

include 'includes/footer.php';