<?php include 'includes/header.php';

//arreglos indexados
$carrito = ['tablet','television','computadora'];
$array = array('cliente 1','cliente 2','cliente 3');

//ver contenido de arreglo
echo "<pre>";
var_dump($carrito);
echo "</pre>"; 

echo $carrito[2]; //acceder a un elemento del array

//agregar elemento
$carrito[3] = 'nuevo producto';
array_push($carrito, 'otro producto');
array_unshift($carrito, 'celular'); //agrega al inicio
echo "<pre>";
var_dump($carrito);
echo "</pre>"; 

//eliminar elemento
array_pop($carrito);
array_shift($carrito); //elimina al principio
echo "<pre>";
var_dump($carrito);
echo "</pre>"; 

include 'includes/footer.php';