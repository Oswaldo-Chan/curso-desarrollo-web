//Strings

//string
const producto = "rol de canela";
//string
const producto_2 = String('brownie "grande"');
//object
const producto_3 = new String("pastel \"mediano\"");

console.log(typeof producto);
console.log(typeof producto_2);
console.log(typeof producto_3);

//longitud del string
console.log(producto.length);
//encuentra la posición de la palabra -1 si no está
console.log(producto.indexOf('canela'));
//retorna true si existe la palabra
console.log(producto_2.includes('brownie')); 
//concatenar
console.log(producto + " y " + producto_2);


