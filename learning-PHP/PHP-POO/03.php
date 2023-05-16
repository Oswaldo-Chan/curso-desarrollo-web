<?php 
declare(strict_types = 1);

use Producto as GlobalProducto;

include 'includes/header.php';
//metodos estaticos
class Producto {
    public $imagen;
    public static $imagenPlaceholder = "imagen.jpg";

    public function __construct(private string $nombre, 
    protected float $precio, protected bool $disponible, string $imagen) {
        if ($imagen) {
            self::$imagenPlaceholder = $imagen;
        }
    }

    public static function obtenerImagenProducto() {
        return self::$imagenPlaceholder;
    }
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

$producto = new Producto('tablet',200,true,'');
$producto->setNombre('celular');

echo $producto->obtenerImagenProducto();

$producto2 = new Producto('monitor',1000,true,'monitorCurvo.jpg');

echo $producto2->obtenerImagenProducto();

include 'includes/footer.php';