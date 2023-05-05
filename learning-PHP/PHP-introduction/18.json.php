<?php include 'includes/header.php';

$productos = [
    [
        'name' => 'tablet',
        'costo' => 200,
        'disponible' => true
    ],
    [
        'name' => 'celular',
        'costo' => 100,
        'disponible' => false
    ],
    [
        'name' => 'monitor',
        'costo' => 550,
        'disponible' => true
    ]
];

echo "<pre>";
var_dump($productos);
$json = json_encode($productos, JSON_UNESCAPED_UNICODE); //string con json
$json_array = json_decode($json); //de string a arreglo
var_dump($json);
var_dump($json_array);
echo "</pre>";

include 'includes/footer.php';