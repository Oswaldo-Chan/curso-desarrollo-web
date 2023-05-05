<?php include 'includes/header.php';

$clientes = [];
$clientes2 = array();
$clientes3 = array('pedro','juan','karen');
$cliente = [
    'nombre' => 'Oswaldo',
    'saldo' => 200
];

//empty - verificar si un array esta vacio
var_dump(empty($clientes));
var_dump(empty($clientes2));
var_dump(empty($clientes3));

//isset - revisa si un arreglo esta creado o propiedad esta definida
var_dump(isset($clientes_2));
var_dump(isset($clientes2));
var_dump(isset($clientes4));

var_dump(isset($cliente['nombre']));
var_dump(isset($cliente['apellido']));

include 'includes/footer.php';