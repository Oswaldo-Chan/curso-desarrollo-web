<?php 
declare(strict_types = 1);
include 'includes/header.php';
//modificadores de acceso
class Producto {
    //public se puede acceder y modificar en cualquier lugar
    //protected se puede acceder unicamente en la clase
    //private solo miembros de la misma clase
    public function __construct(private string $nombre, 
    protected float $precio, protected bool $disponible) {}
    
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
$producto->setNombre('celular');

echo $producto->getNombre();

$producto2 = new Producto('monitor',1000,true);

echo $producto2->getNombre();

include 'includes/footer.php';