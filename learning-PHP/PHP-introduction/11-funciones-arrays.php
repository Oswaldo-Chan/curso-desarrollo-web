<?php include 'includes/header.php';

//in_array - busca elementos en un arreglo
$carrito = ['tablet','computadora','celular'];
var_dump(in_array('tablet',$carrito));

//ordenar elementos
$numeros = array(6,2,7,1,8,0,3);
sort($numeros); //de menor a mayor
echo "<pre>";
var_dump($numeros);
echo "</pre>";

rsort($numeros); //de mayor a menor
echo "<pre>";
var_dump($numeros);
echo "</pre>";

//ordenar arreglos asociativos
$cliente = array(
    'saldo' => 200,
    'tipo' => 'premium',
    'nombre' => 'Oswaldo'
);

asort($cliente); //ordena por valores, orden alfabetico
arsort($cliente); //por valores, inverso al orden alfabetico
ksort($cliente); //ordena llaves, orden alfabetico
krsort($cliente); //llaves, orden inverso al alfabetico
echo "<pre>";
var_dump($cliente);
echo "</pre>";

include 'includes/footer.php';