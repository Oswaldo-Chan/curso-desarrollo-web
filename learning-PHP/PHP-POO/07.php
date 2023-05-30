<?php

use Transporte as GlobalTransporte;
use TransporteInterfaz as GlobalTransporteInterfaz;

 include 'includes/header.php';
//polimorfismo
interface TransporteInterfaz { //define la forma de una clase
    public function getInfo() : string;
    public function getRuedas() : int;
}

class Transporte implements TransporteInterfaz { //esta clase solo puede ser heredada y no instanciada
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision){
        
    }

    public function getInfo() : string {
        return "El transporte tiene ".$this->ruedas." ruedas y una capacidad de ".$this->capacidad." personas";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz{
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $color) {

    }

    public function getInfo() : string {
        return "El auto de color ".$this->color." tiene ".$this->ruedas." ruedas y una capacidad de ".$this->capacidad." personas";
    }

    public function getColor() : string {
        return "El color es ".$this->color;
    }
}

$auto = new Automovil(4,2,'rojo');
echo $auto->getInfo();
echo "<br>";
echo $auto->getColor();

include 'includes/footer.php';