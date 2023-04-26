//iteradores

//for loop
for (let i = 0;i <= 10;i++) {
    console.log(i);
}

for (let i = 1;i <= 10;i++) {
    if(i % 2 === 0) {
        console.log(`${i} es par`);
    } else {
        console.log(`${i} es impar`);
    }
}

const carrito = [
    {nombre: 'monitor', precio: 400},
    {nombre: 'teclado', precio: 230},
    {nombre: 'audifonos', precio: 345},
    {nombre: 'mouse', precio: 50}
];

for (let i = 0; i < carrito.length; i++) {
    console.log(carrito[i].nombre);  
}

//while loop
let j = 1;
while (j < 10) { //primero ejecuta la condicion
    if (j % 2 === 0) {
        console.log(`${j} es par`);
    }
    j++;
}
//do while loop
let k = 0;
do { //se ejecuta al menos una vez y luego verifica la condicion
    console.log(k);
    k++;
} while (k < 10);