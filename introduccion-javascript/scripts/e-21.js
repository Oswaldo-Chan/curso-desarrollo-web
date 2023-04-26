//arrow functions


const sumar2 = function(n1,n2) {
    console.log(n1 + n2);
}
sumar2(5,10);

//sumar2 como arrow function

const sumar = (n1,n2) => console.log(n1+n2);
sumar(2,10);

const imprimirBienvenida = () => {
    console.log("Hola, bienvenido");
    console.log("esto es una bienvenida");
};
imprimirBienvenida();

const aprendiendo = tecnologia => console.log(`aprendiendo ${tecnologia}`);
aprendiendo("javascript");

//arrow functions perfecto para array methods

const meses = ['enero','febrero','marzo','abril','mayo'];

//foreach y arrow function
meses.forEach(mes => {
    if(mes == 'marzo') {
        console.log("existe");
    } 
});

const carrito = [
    {nombre: 'monitor', precio: 400},
    {nombre: 'teclado', precio: 230},
    {nombre: 'audifonos', precio: 345},
    {nombre: 'mouse', precio: 50}
];

resultado = carrito.some(producto => producto.nombre === 'audifonos');

resultado = carrito.reduce((total, producto) => total + producto.precio,0); 

resultado = carrito.filter(producto => producto.precio > 100);
