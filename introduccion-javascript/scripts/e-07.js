//orden de las operaciones

const porcentaje_descuento = 0.5;
let descuento = (100+20+35)*porcentaje_descuento;
let precio = 100+20+30;
precio -= descuento;

console.log(descuento);

//incrementos
let i = 10;
console.log(i++); //primero imprime y luego incrementa
console.log(++i); //primero incrementa y luego imprime
//decrementos
console.log(i--); //primero imprime y luego decrementa
console.log(--i); //primero decrementa y luego imprime

