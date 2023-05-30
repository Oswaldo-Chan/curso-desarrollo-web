<?php include 'includes/header.php';
//namespaces

/* require 'classes/Clientes.php';
require 'classes/Detalles.php';
 */

 use App\Clientes;
 use App\Detalles;

function autoload($class) {
    $partes = explode('\\',$class);
    require __DIR__.'/classes/'.$partes[1].'.php';
}

spl_autoload_register('autoload');

$detalles = new Detalles();
$clientes = new Clientes();

include 'includes/footer.php';