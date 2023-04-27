//notification API 

const boton = document.querySelector('#boton');

boton.addEventListener('click', () => {
    Notification.requestPermission()
        .then(result => console.log(`el resultado es ${result}`))
});

if (Notification.permission == 'granted') {
    new Notification('esta es una notificacion', {
        icon: 'img/ccj.png',
        body: 'Codigo con Juan, los mejores tutoriales'
    })
}