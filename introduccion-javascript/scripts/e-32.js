// async / await codigo que espera a que el llamado se complete
//puede haber codigo que no le interese el llamado a las apis y no necesitaria bloquearse

function descargarNuevosClientes() {
    return new Promise( resolve => {
        console.log('descargando clientes... espere...');
    
        setTimeout(() => {
            resolve('los clientes fueron descargados');
        },5000); //5 segundos
    });
}

function descargarUltimosPedidos() {
    return new Promise( resolve => {
        console.log('descargando pedidos... espere...');

        setTimeout(() => {
            resolve('los pedidos fueron descargados');
        }, 3000);
    });
}

async function app() {
    try {
        const resultado = await descargarNuevosClientes(); //colocar await en donde estara el promise
        console.log('este codigo si se bloquea');
        console.log(resultado);
    } catch (error) {
        console.log(error);
    }
}

// app();
// console.log('este codigo no se bloquea');

//dos consultas a la vez con async await

async function init() {
    try {
        // const clientes = await descargarNuevosClientes();
        // const pedidos = await descargarUltimosPedidos();
        // console.log(clientes);
        // console.log(pedidos);

        const resultado = await Promise.all([descargarNuevosClientes(), descargarUltimosPedidos()]);
        console.log(resultado[0]);
        console.log(resultado[1]);
    } catch (error) {
        console.log(error);
    }
}

init();
