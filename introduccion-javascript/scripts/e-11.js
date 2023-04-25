const producto = {
    nombre: "Monitor",
    precio: 100,
    disponible: true
}

const precio_producto = producto.precio;
const nombre_producto = producto.nombre;

console.log(precio_producto);
console.log(nombre_producto);

//nueva forma - destructuring
const {precio, nombre} = producto;
console.log(precio);
console.log(nombre);