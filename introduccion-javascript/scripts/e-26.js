//this - referencia al objeto

const reservacion = {
    nombre: 'oswaldo',
    total: 5000,
    pagado: false,
    informacion: function() { //hace referencia al objeto y si es un arrow function hace referencia al window
        console.log(`el cliente ${this.nombre} reservo y su cantidad a pagar es ${this.nombre}`);
    }
}

console.log(reservacion.nombre);