<?php 
declare(strict_types = 1);
include 'includes/header.php';
//creando una clase
class Producto {
    public function __construct(public string $nombre, 
    public float $precio, public bool $disponible) {}   
}

$producto = new Producto('tablet',200,true);

echo '<pre>';
var_dump($producto);
echo '</pre>';

$producto2 = new Producto('monitor',1000,true);

echo '<pre>';
var_dump($producto2);
echo '</pre>';

include 'includes/footer.php';