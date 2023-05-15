<?php 
declare(strict_types = 1);
include 'includes/header.php';
//creando una clase
class Producto {
    public function __construct(public string $nombre, 
    public float $precio, public bool $disponible) {}
    
    public function mostrarProducto() : void {
        echo "El producto ".$this->nombre." cuesta $".$this->precio;
    }
    public function getNombre() : string {
        return $this->nombre;
    }
    public function getPrecio() : float {
        return $this->precio;
    }
    public function getDisponible() : bool {
        return $this->disponible;
    }
    public function setNombre( string $nombre) : void {
        $this->nombre = $nombre;
    }
    public function setPrecio(float $precio) : void {
        $this->precio = $precio;
    }
    public function setDisponible(bool $disponible) : void {
        $this->disponible = $disponible;
    }
}

$producto = new Producto('tablet',200,true);
$producto->mostrarProducto();
$producto->setNombre('celular');

echo '<pre>';
var_dump($producto);
echo '</pre>';

echo $producto->getNombre(); //aunque es mas facil como $producto->nombre;

$producto2 = new Producto('monitor',1000,true);
$producto2->mostrarProducto();

echo '<pre>';
var_dump($producto2);
echo '</pre>';

include 'includes/footer.php';