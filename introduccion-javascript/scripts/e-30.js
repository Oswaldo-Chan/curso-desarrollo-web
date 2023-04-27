//promises

const usuarioAuntenticado = new Promise( (resolve, reject) => {
    const auth = true;

    if (auth) {
        resolve('usuario autenticado'); //se cumple la promesa
    } else {
        reject('no se pudo iniciar sesion'); // no se cumple la promesa
    }
});

usuarioAuntenticado
    .then( resultado => console.log(resultado)) //se ejecuta si se cumple
    .catch( error => console.log(error)) //se ejecuta si no se cumple

//tres valores en promises:
// pending: no se ha cumplido ni rechazado
// fulfilled: se ha cumplido la promesa
// rejected: se ha rechazado