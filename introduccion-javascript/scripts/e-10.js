//objetos

const producto = {
    nombre: "Monitor",
    precio: 100,
    disponible: true
}

console.log(producto);
console.log(producto.nombre);
console.log(producto.precio);
console.log(producto.disponible);

//otra sintaxis
console.log(producto["disponible"]);

//agregar otras propiedades
producto.imagen = 'imagen.jpg';
console.log(producto);
//eliminar propiedades
delete producto.disponible;
console.log(producto);

