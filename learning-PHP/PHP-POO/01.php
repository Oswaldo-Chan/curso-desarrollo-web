<?php 
declare(strict_types = 1);
include 'includes/header.php';
//creando una clase
class Producto {
    public $nombre;
    public $precio;
    public $disponible;

    public function __construct(string $nombre, float $precio, bool $disponible) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->disponible = $disponible;
    }   
}

$producto = new Producto('tablet',200,true);

echo '<pre>';
var_dump($producto);
echo '</pre>';
$producto2 = new Producto('monitor',1000,true);

echo $producto2->nombre;
echo '<pre>';
var_dump($producto2);
echo '</pre>';

include 'includes/footer.php';