//array methods
const meses = ['enero','febrero','marzo','abril','mayo'];

const carrito = [
    {nombre: 'monitor', precio: 400},
    {nombre: 'teclado', precio: 230},
    {nombre: 'audifonos', precio: 345},
    {nombre: 'mouse', precio: 50}
];

//foreach
meses.forEach(function(mes) {
    if(mes == 'marzo') {
        console.log("existe");
    } 
});


//includes
let resultado = meses.includes('marzo');
console.log(resultado);
// some ideal para arreglo de objetos
resultado = carrito.some(function(producto) {
    return producto.nombre === 'audifonos';
});
console.log(resultado);
//arrow functions
resultado = carrito.some(producto => producto.nombre === 'teclado');

//reduce toma los numeros y entrega un resultado
resultado = carrito.reduce(function(total, producto) {
    return total + producto.precio;
}, 1000); //inicia en 1000

console.log(resultado);

//filter trae los productos con precios mayor a 100
resultado = carrito.filter(function(producto) {
    return producto.precio > 100;
});
resultado = carrito.filter(function(producto) {
    return producto.nombre != 'teclado';
});
console.log(resultado);
