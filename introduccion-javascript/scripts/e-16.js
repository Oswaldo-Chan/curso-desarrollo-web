//declaracion de funcion
function sumar() {
    console.log(2*4);
}

//expresion de la funcion
const numero = function() {
    console.log(3+3);
}

numero();

//IIFE - permite que las variables no se mezclen
(function() {
    console.log("esto es una funcion que se llama a si misma");
})();


/*
Hoisting

//declaracion de funcion
function sumar() {
    console.log(2*4);
}

//expresion de la funcion
const numero = function() {
    console.log(3+3);
}

en el primero no marca error y en el segundo si porque no es una funcion como tal
ya que js se ejecuta en dos vueltas y en la primera registra las funciones
y la segunda se ejecuta el codigo

*/