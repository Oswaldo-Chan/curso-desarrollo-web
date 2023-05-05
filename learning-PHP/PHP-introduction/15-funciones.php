<?php 
declare(strict_types=1);
include 'includes/header.php';

//funciones 

function sumar(int $a = 0, float $b = 0){
    echo $a+$b;
}

sumar(2,4.5);
sumar(240,60.2);
sumar(25,0.1);

//parametros nombrados

sumar(b: 20, a: 50);

include 'includes/footer.php';