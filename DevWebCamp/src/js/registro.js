(function(){
    let eventos = [];
    const eventosBtn = document.querySelectorAll('.evento__agregar');

    eventosBtn.forEach(btn => btn.addEventListener('click', seleccionarEvento));

    function seleccionarEvento(e) {
        eventos = [...eventos, {
            id: e.target.dataset.id,
            titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
        }]
        
        e.target.disabled = true;
        console.log(eventos);
    }
})();