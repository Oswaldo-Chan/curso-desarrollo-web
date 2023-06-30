(function() { //IIEF
    obtenerTareas();
    let tareas = [];

    //boton para mostrar el modal de agregar tarea
    const nuevaTareaBtn = document.querySelector('#agregar-tarea');
    nuevaTareaBtn.addEventListener('click', mostrarFormulario);

    async function obtenerTareas() {
        try {
            const id = obtenerProyecto();
            const url = `/api/tareas?url=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            tareas = resultado.tareas;
            mostrarTareas();

        } catch (error) {
            console.log(error)
        }
    }

    function mostrarTareas() {
        limpiarTareas();
        if (tareas.length === 0) {
            const contenedorTareas = document.querySelector('#listado-tareas');
            const textoNoTareas = document.createElement('LI');
            textoNoTareas.textContent = 'No hay tareas';
            textoNoTareas.classList.add('no-tareas');

            contenedorTareas.appendChild(textoNoTareas);
            return;
        }

        const estados = {
            0: 'Pendiente',
            1: 'Completa'
        }

        tareas.forEach(tarea => {
            const contenedorTarea = document.createElement('LI');
            contenedorTarea.dataset.tareaId = tarea.id;
            contenedorTarea.classList.add('tarea');

            const nombreTarea = document.createElement('P');
            nombreTarea.textContent = tarea.nombre;

            const opcionesDiv = document.createElement('DIV');
            opcionesDiv.classList.add('opciones');

            const btnEstadoTarea = document.createElement('BUTTON');
            btnEstadoTarea.classList.add('estado-tarea');
            btnEstadoTarea.classList.add(`${estados[tarea.estado].toLowerCase()}`);
            btnEstadoTarea.textContent = estados[tarea.estado];
            btnEstadoTarea.dataset.estadoTarea = tarea.estado;

            btnEstadoTarea.ondblclick = function(){
                cambiarEstadoTarea({...tarea});
            }
            
            const btnEliminarTarea = document.createElement('BUTTON');
            btnEliminarTarea.classList.add('eliminar-tarea');
            btnEliminarTarea.dataset.idTarea = tarea.id;
            btnEliminarTarea.textContent = 'Eliminar';
            btnEliminarTarea.ondblclick = function() {
                confirmarEliminarTarea({...tarea});
            }

            opcionesDiv.appendChild(btnEstadoTarea);
            opcionesDiv.appendChild(btnEliminarTarea);

            contenedorTarea.appendChild(nombreTarea);
            contenedorTarea.appendChild(opcionesDiv);

            const listadoTareas = document.querySelector('#listado-tareas');
            listadoTareas.appendChild(contenedorTarea);
        });
    }

    function mostrarFormulario() {
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `
            <form class="formulario nueva-tarea">
                <legend>Añade una Nueva Tarea</legend>
                <div class="campo">
                    <input type="text" name="tarea" id="tarea" placeholder="Añadir tarea al proyecto actual"/>
                </div>
                <div class="opciones">
                    <input type="submit" class="submit-nueva-tarea" value="Añadir Tarea"/>
                    <button type="button" class="cerrar-modal">Cancelar</button>
                </div>
            </form>
        `;
        
        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        },0);

        modal.addEventListener('click', function(e) {
            e.preventDefault();

            if(e.target.classList.contains('cerrar-modal')) {
                const formulario = document.querySelector('.formulario');
                formulario.classList.add('cerrar');

                setTimeout(() => {
                    modal.remove();
                }, 500);
            }
            if (e.target.classList.contains('submit-nueva-tarea')) {
                submitNuevaTarea();
            }
        });

        document.querySelector('.dashboard').appendChild(modal);
    }

    function submitNuevaTarea() {
        const tarea = document.querySelector('#tarea').value.trim();
        
        if (tarea === '') {
            mostrarAlerta('El campo es obligatorio', 'error', document.querySelector('.formulario legend'));
            return;
        }

        agregarTarea(tarea);
    }

    function mostrarAlerta(mensaje, tipo, referencia) {
        const alertaPrevia = document.querySelector('.alerta');

        if (alertaPrevia) {
            alertaPrevia.remove();
        }

        const alerta = document.createElement('DIV');
        alerta.classList.add('alerta', tipo);
        alerta.textContent = mensaje;

        //inserta la alerta despues del legend
        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);
        
        setTimeout(() => {
            alerta.remove();
        }, 5000);
    }

    async function agregarTarea(tarea) {
        const datos = new FormData();
        datos.append('nombre', tarea);
        datos.append('proyectoId', obtenerProyecto());

        try {
            const url = '/api/tarea';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            mostrarAlerta(resultado.mensaje, resultado.tipo , document.querySelector('.formulario legend'));

            if (resultado.tipo === 'exito') {
                const modal = document.querySelector('.modal');
                
                setTimeout(() => {
                    modal.remove();
                }, 1200);

                const tareaObj = {
                    id: String(resultado.id),
                    nombre: tarea,
                    estado: "0",
                    proyectoId: resultado.proyectoId
                }

                tareas = [...tareas, tareaObj];
                mostrarTareas();
            }
        } catch (error) {
            console.log(error);
        }
    }

    function cambiarEstadoTarea(tarea) {
        const nuevoEstado = tarea.estado === "1" ? "0" : "1";
        tarea.estado = nuevoEstado;
        actualizarTarea(tarea);
    }

    async function actualizarTarea(tarea) {
        const {estado, id, nombre} = tarea;
        const datos = new FormData();
        datos.append('id',id);
        datos.append('nombre',nombre);
        datos.append('estado',estado);
        datos.append('proyectoId', obtenerProyecto());
        
        try {
            const url = '/api/tarea/actualizar';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if (resultado.respuesta.tipo === 'exito') {
                mostrarAlerta(resultado.respuesta.mensaje, resultado.respuesta.tipo, document.querySelector('.contenedor-nueva-tarea'));
                
                tareas = tareas.map(tareaMemoria => {
                    if (tareaMemoria.id === id) {
                        tareaMemoria.estado = estado;
                    }
                    return tareaMemoria;
                });
                mostrarTareas();
            }
        } catch (error) {
            console.log(error)
        }
    }

    function confirmarEliminarTarea(tarea) {
        Swal.fire({
            title: '¿Estás Seguro?',
            text: "No podrás revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
                eliminarTarea(tarea);
            }
          })
    }

    async function eliminarTarea(tarea) {
        const {estado, id, nombre} = tarea;
        const datos = new FormData();
        datos.append('id',id);
        datos.append('nombre',nombre);
        datos.append('estado',estado);
        datos.append('proyectoId', obtenerProyecto());

        try {
            const url = '/api/tarea/eliminar';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if (resultado.resultado) {     

                Swal.fire(
                    '¡Eliminado!',
                    resultado.mensaje,
                    'success'
                )

                tareas = tareas.filter(tareaMemoria => tareaMemoria.id !== tarea.id);
                mostrarTareas();
            }
        } catch (error) {
            console.log(error)
        }
    }

    function obtenerProyecto() {
        const proyectoParams = new URLSearchParams(window.location.search);
        const proyecto = Object.fromEntries(proyectoParams.entries());
        
        return proyecto.url;
    }

    function limpiarTareas() {
        const listadoTareas = document.querySelector('#listado-tareas');
        
        while (listadoTareas.firstChild) {
            listadoTareas.removeChild(listadoTareas.firstChild);
        }
    }
})();