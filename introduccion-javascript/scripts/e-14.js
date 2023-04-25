//arrays

const numeros = [10,20,30,40];

console.table(numeros);

const tallas = new Array('grande','mediana','chica');
console.table(tallas);

const arreglo = ["hola",20,true,{nombre: "oswaldo", edad: 20},[1,2,3,4],null];
console.log(arreglo);
//acceso
console.log(arreglo[3]);//empieza desde 0
console.log(arreglo.length);

numeros.forEach( function(numero) { //propio de js
    console.log(numero);
})

//metodos para agregar

tallas[3] = 'extra-chica';
tallas.push('extra-grande'); //agrega al final
numeros.unshift(2,5,7); //agrega al inicio
numeros.pop(); //elimina el ultimo elemento
numeros.shift() //elimina el primer elemento
tallas.splice(2,1); //a partir de donde y cuantos eliminara

//rest operator o spread operator 
const nuevoArreglo = ['extra extra chica', ...tallas, 'extra extra grande'];

console.log(tallas);
console.log(numeros);
console.log(nuevoArreglo);