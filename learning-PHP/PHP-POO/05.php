<?php include 'includes/header.php';

abstract class Transporte { //esta clase solo puede ser heredada y no instanciada
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision){
        
    }

    public function getInfo() : string {
        return "El transporte tiene ".$this->ruedas." ruedas y una capacidad de ".$this->capacidad." personas";
    }
}
class Bicicleta extends Transporte {
    public function __construct(protected int $ruedas, protected int $capacidad){
        
    }
    public function getInfo() : string {
        return parent::getInfo()." y no ocupa gasolina"; //accede al metodo getInfo de la clase padre y le agrega mas info. 
    }
}
class Moto extends Transporte {
}
class Auto extends Transporte {
}
class Bus extends Transporte {
}

echo "<hr>";
$moto = new Moto(2,2,'automatica');
echo $moto->getInfo();
echo "<hr>";
$auto = new Auto(4,5,'manual');
echo $auto->getInfo();
echo "<hr>";
$bus = new Bus(4,24,'manual');
echo $bus->getInfo();
echo "<hr>";
$bicicleta = new Bicicleta(2,1);
echo $bicicleta->getInfo();


include 'includes/footer.php';