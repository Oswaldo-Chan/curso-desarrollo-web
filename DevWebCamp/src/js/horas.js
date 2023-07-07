(function(){
    const horas = document.querySelector('#horas');

    if (horas) {
        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const hiddenDia = document.querySelector('[name="dia_id"]');
        const hiddenHora = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));
        
        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +hiddenDia.value || '' 
        }

        if (!Object.values(busqueda).includes('')) {
            
            async function init() { //tambien se puede con IIFE
                await buscarEventos();

                const id = hiddenHora.value;

                const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`);
                horaSeleccionada.classList.remove('horas__hora--deshabilitada');
                horaSeleccionada.classList.add('horas__hora--seleccionada');

                horaSeleccionada.onclick = seleccionarHora;
            }  

            init();
        }

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;

            hiddenHora.value = '';
            hiddenDia.value = '';
            
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }
            
            if (Object.values(busqueda).includes('')) {
                return;
            }

            buscarEventos();
        }

        async function buscarEventos() {
            const {dia, categoria_id} = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
            
            const resultado = await fetch(url);
            const eventos = await resultado.json();

            obtenerHorasDisponibles(eventos);
        }

        function obtenerHorasDisponibles(eventos) {
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'));

            const horasTomadas = eventos.map( evento => evento.hora_id);

            const listadoHorasArray = Array.from(listadoHoras);
            const resultado = listadoHorasArray.filter( li => !horasTomadas.includes(li.dataset.horaId));
            
            resultado.forEach( li => li.classList.remove('horas__hora--deshabilitada'));

            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');
            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
        
            //elimina el eventListener al cambiar los terminos de busqueda
            const horasNoDisponibles = document.querySelectorAll('.horas__hora--deshabilitada');
            Array.from(horasNoDisponibles).map(hora => {
                hora.removeEventListener('click', seleccionarHora);
            });  
        }

        function seleccionarHora(e) {
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            e.target.classList.add('horas__hora--seleccionada');
            hiddenHora.value = e.target.dataset.horaId;

            hiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }
})();