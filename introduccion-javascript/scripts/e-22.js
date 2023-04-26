//estructuras de control
const puntaje = '1000';

if (puntaje == 1000) { // == no es tan estricto al comparar
    console.log("el puntaje es 1000"); 
}

if (puntaje === 1000) { //la condicion no se cumple porque === si es mas estricto
    console.log("el puntaje es 1000");
} 

//if y else

const score = 1000;

if (score !== 1000) {
    console.log("el score no es 1000");
} else if (score > 1000){
    console.log("el score es mayor a 1000");
} else if (score < 1000){
    console.log("el score es menor a 1000");
} else {
    console.log("es igual a 1000");
}

