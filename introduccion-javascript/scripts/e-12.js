"use strict"; //js modo estricto marca error para evitar malas practicas
//object methods
const producto = {
    nombre: "Monitor",
    precio: 100,
    disponible: true
}

Object.freeze(producto); //evita cambiar, eliminar o agregar propiedades
console.log(Object.isFrozen(producto)); 

Object.seal(producto); //solo permite modificar propiedades existentes
producto.precio = 50;

console.log(producto);