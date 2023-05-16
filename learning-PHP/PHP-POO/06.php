<?php include 'includes/header.php';

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

include 'includes/footer.php';