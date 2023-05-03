<?php include 'includes/header.php';

//operadores de comparacion
$n1 = 10;
$n2 = 20;
$n3 = 30;
$n4 = "10";

var_dump($n1 >= $n2);
echo "<br/>";

var_dump($n1 <= $n2);
echo "<br/>";

var_dump($n1 == $n2);
echo "<br/>";

var_dump($n1 === $n4);
echo "<br/>";

// 0 si son iguales, -1 si n4 es mayor, 1 si n1 es mayor
var_dump($n1 <=> $n4);

include 'includes/footer.php';