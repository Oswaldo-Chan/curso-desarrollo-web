//funciones que retornan un valor

function restar(n1 = 0,n2 = 0) {
    return n1-n2;
}

function imprimir(resultado) {
    console.log(resultado);
}

imprimir(restar(10,2)); 

let total = 0;

function agregarCarrito(precio) {
    return total += precio;
}

function calcularImpuesto(total) {
    return 1.15 * total;
}

total = agregarCarrito(200);
total = agregarCarrito(400);
total = agregarCarrito(600);

console.log(total);

const total_a_pagar = calcularImpuesto(total);

imprimir(total_a_pagar);
