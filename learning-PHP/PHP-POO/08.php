<?php include 'includes/header.php';
//incluyendo clases

function autoload($class) {
    require __DIR__.'/classes/'.$class.'.php';
}

spl_autoload_register('autoload');

$detalles = new Detalles();
$clientes = new Clientes();

include 'includes/footer.php';