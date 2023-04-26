//foreach y map
const carrito = [
    {nombre: 'monitor', precio: 400},
    {nombre: 'teclado', precio: 230},
    {nombre: 'audifonos', precio: 345},
    {nombre: 'mouse', precio: 50}
];

//foreach - preferible para visualizar un listado
carrito.forEach(producto => console.log(producto.nombre));
//map - preferible para crear arreglos
const carritoPrecios = carrito.map(producto => producto.precio);
carritoPrecios.forEach(precio => console.log(precio));