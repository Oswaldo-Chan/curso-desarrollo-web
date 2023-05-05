<?php include 'includes/header.php';

//while
$i = 0;

while ($i < 10) {
    echo $i."<br>";
    $i++; //incremento
}

/*
while ($i < 10):
    echo $i."<br>";
    $i++; //incremento
endwhile;
*/

//do while
$j = 100;

do {
    echo $j."<br>";
    $j++;
} while ($j < 10);

// for
for ($i=0; $i < 10; $i++) { 
    echo $i."<br>";
}

/*
Ejercicio:

Si es divisible entre 3 - imprimir fizz
Si es divisible entre 5 - imprimir buzz
Si es divisible entre 3 y 5 - imprimir FIZZBUZZ
*/

for ($k=0; $k < 100; $k++) { 
    if ($k % 3 === 0 && $k % 5 === 0) {
        echo "FizzBuzz";
    } else if ($k % 3 === 0){
        echo "fizz";
    } else if ($k % 5 === 0){
        echo "buzz";
    }
}

/*
for ($k=0; $k < 100; $k++):
    if($k % 3 === 0 && $k % 5 === 0):
        echo "FizzBuzz";
    elseif($k % 3 === 0):
        echo "fizz";
    elseif($k % 5 === 0):
        echo "buzz";
    else:
    endif;
endfor;
}
*/


//for each 
$clientes = array('pedro','juan','karen');

foreach($clientes as $cliente){
    echo $cliente."<br>";
}

for ($i=0; $i < count($clientes); $i++) { 
    echo $clientes[$i]."<br>";
}

/*
$clientes = array('pedro','juan','karen');

foreach($clientes as $cliente):
    echo $cliente."<br>";
endforeach;
*/

//array asociativo
$cliente = [
    'nombre' => 'oswaldo',
    'saldo' => 200,
    'tipo' => 'premium'
];

foreach($cliente as $key => $valor){ //iteracion sobre llaves y valores
    echo $key." - ".$valor."<br>";
}

include 'includes/footer.php';