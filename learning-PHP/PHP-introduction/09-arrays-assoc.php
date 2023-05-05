<?php include 'includes/header.php';

//arreglos asociativos : son como objetos en js

$cliente = [
    'nombre' => 'Oswaldo',
    'saldo' => 600,
    'info' => [
        'tipo' => 'premium',
        'disponible' => 100
    ]
];

//agregar nueva propiedad
$cliente['codigo'] = 123456;
$cliente['info']['vigente'] = true;

//modificar nueva propiedad
$cliente['nombre'] = "Oswaldo Chan";

echo "<pre>";
var_dump($cliente['nombre']);
var_dump($cliente['info']['tipo']);
echo "</pre>";

echo "<pre>";
var_dump($cliente);
echo "</pre>";

include 'includes/footer.php';