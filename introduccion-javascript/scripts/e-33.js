//fetch api 
// permite enviar info al servidor u obtener info de un servidor
// puedes obtener un local file o respuesta de un servidor (json o txt)
// utiliza promises  y async / await

async function obtenerEmpleados() { //si status = 200 si se pudo conectar
    const file = 'empleados.json';
    // fetch(file)
    //     .then( resultado => resultado.json())
    //     .then( datos => {
    //         // console.log(datos.empleados);

    //         const {empleados} = datos;
    //         // console.log(empleados);
    //         empleados.forEach(empleado => {
    //             console.log(empleado.id);
    //             console.log(empleado.nombre);
    //             console.log(empleado.puesto);

    //             document.querySelector('.contenido').textContent += empleado.nombre;
    //         })
    //     })

    const resultado = await fetch(file);
    const datos = await resultado.json();
    console.log(datos);
}

obtenerEmpleados();