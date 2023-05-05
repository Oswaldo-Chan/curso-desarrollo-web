<?php include 'includes/header.php';

//condicionales
$auth = true;
$admin = false;

if ($auth && $admin) {
    echo "Usuario Autenticado";
} else {
    echo "Usuario no Autenticado";
}
//if anidados
$cliente = [
    'nombre' => 'Oswaldo',
    'saldo' => 200,
    'info' => [
        'tipo' => 'premium'
    ]  
];

if (!empty($cliente)) {
    echo "el arreglo no esta vacio";

    if ($cliente['saldo'] > 0) {
        echo "el cliente no tiene saldo vacio";
    } else {
        echo "saldo vacio";
    }
}

//else if
if ($cliente['saldo'] > 0) {
    echo "el cliente tiene saldo";
} else if($cliente['informacion']['tipo'] === 'premium'){
    echo "el cliente es premium";
} else {
    "no hay cliente definido o no tiene saldo o no es premium";
}

//switch
$tech = 'PHP';

switch ($tech) {
    case 'PHP':
        echo "PHP, un excelente lenguaje";
        break;

    case 'JavaScript':
        echo "el lenguaje de la web";
        break;
        
    default:
        echo "lenguaje desconocido";
        break;
}

include 'includes/footer.php';