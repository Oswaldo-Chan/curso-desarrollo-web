import Swal from 'sweetalert2';

(function(){
    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');
    if (resumen) {
        const eventosBtn = document.querySelectorAll('.evento__agregar');
        eventosBtn.forEach(btn => btn.addEventListener('click', seleccionarEvento));
    
        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function seleccionarEvento(e) {
            if (eventos.length < 5) {
                e.target.disabled = true;
    
                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }]
                
                mostrarEventos();
            } else {
                Swal.fire({
                    title: 'Límite Máximo',
                    text: 'Máximo 5 eventos por registro',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        }
    
        function mostrarEventos() {
            limpiarEventos();
    
            if (eventos.length > 0) {
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro-sidebar__evento');
    
                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro-sidebar__nombre');
                    titulo.textContent = evento.titulo;
    
                    const eliminarBtn = document.createElement('BUTTON');
                    eliminarBtn.classList.add('registro-sidebar__eliminar');
                    eliminarBtn.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    eliminarBtn.onclick = function() {
                        eliminarEvento(evento.id);
                    }
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(eliminarBtn);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, añade hasta 5 del lado izquierdo';
                noRegistro.classList.add('registro-sidebar__texto');
                resumen.appendChild(noRegistro);
            }
        }
    
        function eliminarEvento(id) {
            eventos = eventos.filter(evento => evento.id !== id);
            const agregarBtn = document.querySelector(`[data-id="${id}"]`);
            agregarBtn.disabled = false;
    
            mostrarEventos();
        }
    
        function limpiarEventos() {
            while (resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(e) {
            e.preventDefault();

            const regaloId = document.querySelector('#regalo').value;
            const eventosId = eventos.map(evento => evento.id);
            
            if (eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: '¡UPS!',
                    text: 'Debes elegir al menos un evento y un regalo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                return;
            }
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();

            if (resultado.resultado) {
                Swal.fire(
                    '¡Registro Exitoso!',
                    'tu registro se completó de forma exitosa, te esperamos en DevWebCamp',
                    'success'
                ).then(() => location.href = `/boleto?id=${resultado.token}`)
            } else {
                Swal.fire({
                    title: '¡UPS!',
                    text: 'Hubo un error durante el registro, inténtelo de nuevo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => location.reload())
            }
        }
    }
})();