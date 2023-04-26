// POO

//object literal
const producto_info = {
    name: 'tablet',
    precio: 500
}

//object constructor se puede usar function o class

function producto(nombre, precio) {
    this.nombre = nombre;
    this.precio = precio;
}

class Persona {
    constructor(nombre, edad, mascota) {
        this.nombre = nombre;
        this.edad = edad;
        this.mascota = mascota;
    }
}
class Mascota {
    constructor(nombre, color) {
        this.nombre = nombre;
        this.color = color;
    }
}

const mascota = new Mascota('Alana','negro');
const persona = new Persona('Oswaldo',20,mascota);

console.log(persona);


