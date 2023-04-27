const datos = { 
    nombre: '',
    email: '',
    mensaje: ''
}

const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');
const form = document.querySelector('.formulario');

nombre.addEventListener('input', leerTexto);
email.addEventListener('input', leerTexto);
mensaje.addEventListener('input', leerTexto);
form.addEventListener('submit', e => {
    e.preventDefault();

    const {nombre, email, mensaje} = datos;

    if (nombre === '' || email === '' || mensaje === '') {
        mostrarAlerta('Rellena Todos Los Campos', true);
        return;
    }

    mostrarAlerta('Datos Enviados Correctamente')
});

function leerTexto(e) {
    datos[e.target.id] = e.target.value;
    console.log(datos);
}

function mostrarAlerta(mensaje, error = null) {
    const alerta = document.createElement('P');
    alerta.textContent = mensaje;

    if (error) {
        alerta.classList.add('error');
    } else {
        alerta.classList.add('correcto');
    }

    form.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}
