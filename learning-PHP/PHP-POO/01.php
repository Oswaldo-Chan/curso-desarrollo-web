<?php include 'includes/header.php';

//creando una clase
class Producto {
    public $nombre;
    public $precio;
    public $disponible;


}

$producto = new Producto();
$producto->nombre = 'tablet';
$producto->precio = 200;
$producto->disponible = true;
echo '<pre>';
var_dump($producto);
echo '</pre>';
$producto2 = new Producto();
$producto2->nombre = 'monitor';
$producto2->precio = 1000;
$producto2->disponible = false;
echo $producto2->nombre;
echo '<pre>';
var_dump($producto2);
echo '</pre>';

include 'includes/footer.php';