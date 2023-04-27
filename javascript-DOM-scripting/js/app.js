// querySelector

const heading = document.querySelector('.header__texto h2') //retorna 0 o 1 elementos
heading.textContent = 'El mejor blog de café';

const a = document.querySelector('a') //solo retorna un enlace aunque hayan mas
// querySelectorAll
const enlaces = document.querySelectorAll('.navegacion a'); //selecciona todos los enlaces
enlaces[0].textContent = 'Enlace JS';
enlaces[0].classList.add('nueva-clase');
enlaces[2].classList.remove('navegacion__enlace');
enlaces.forEach(enlace => enlace.href = 'https://www.google.com/?hl=es');
// getElementById
const heading2 = document.getElementById('heading');
console.log(heading2);
//generar un nuevo enlace
const nuevoEnlace = document.createElement('A') //recomienda usar mayusculas
//agregar href
nuevoEnlace.href = 'nuevo-enlace.html';
//agregar texto
nuevoEnlace.textContent = 'nuevo enlace';
//agregar clase
nuevoEnlace.classList.add('navegacion__enlace');
//agregar al documento
const nav = document.querySelector('.navegacion');
nav.appendChild(nuevoEnlace);

console.log(nuevoEnlace);

//EVENTOS

console.log(1);

window.addEventListener('load',function() { //load espera a que js y archivos que dependen de HTML esten listos
    console.log(2);
});

window.onload = function() { //otra forma diferente
    console.log(3);
}

document.addEventListener('DOMContentLoaded', function() {
    console.log(4); //solo espera a que se descargue el html
});

console.log(5);

window.onscroll = function() {
    console.log('scrolling...');
}

//seleccionar elementos y asociarles un evento
const btnEnviar = document.querySelector('.boton--primario');

// btnEnviar.addEventListener('click', function (evento) {
//     evento.preventDefault(); //util para validar un formulario
//     console.log('enviando formulario');
// });


// eventos de inputs y text area
/*
change se ejecuta hasta salir del input
input se ejecuta en tiempo real
*/
const datos = { //los nombres deben ser iguales al id
    nombre: '',
    email: '',
    mensaje: ''
}

const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');

nombre.addEventListener('input', leerTexto);

email.addEventListener('input', leerTexto);

mensaje.addEventListener('input', leerTexto);

function leerTexto(e) {
    // console.log(e.target.value); // se lee la entrada en la consola
    datos[e.target.id] = e.target.value;

    console.log(datos);
}

//evento submit - usar submit en formulario

const form = document.querySelector('.formulario');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Enviando Formulario');
});

