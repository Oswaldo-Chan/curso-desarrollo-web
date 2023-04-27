// POO

//object literal
const producto_info = {
    name: 'tablet',
    precio: 500
}

//object constructor se puede usar function o class

function Producto(nombre, precio) {
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

const producto = new Producto('monitor',20);
const mascota = new Mascota('Alana','negro');
const persona = new Persona('Oswaldo',20,mascota);

console.log(persona);

// prototypes - función que esta asociada a un propio objeto

function formatearPersona(p) {
    return `${p} tiene una mascota llamada ${p.mascota.nombre}`;
}

//funcion anterior como prototype
Persona.prototype.formatearPersona = function() {
    return `${this.nombre} tiene una mascota llamada ${this.mascota.nombre}`;
}

Producto.prototype.formatearProducto = function() {
    return `${this.nombre} cuesta $ ${this.precio}`;
}

console.log(persona.formatearPersona());