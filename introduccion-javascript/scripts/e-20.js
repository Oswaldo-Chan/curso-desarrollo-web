//metodos de propiedad

const reproductor = {
    reproducir: function(id) {
        console.log(`reproduciendo cancion con el ID: ${id}`);
    },
    pausar: function() {
        console.log('pausando...');
    },
    crearPlaylist: function(nombre) {
        console.log(`creando la playlist: ${nombre}`);
    },
    reproducirPlaylist: function(nombre) {
        console.log(`reproduciendo la playlist: ${nombre}`);
    }
}
reproductor.borrarCancion = function(id) {
    console.log(`borrando cancion con el ID: ${id}`);
}
reproductor.reproducir(3840);
reproductor.pausar();
reproductor.borrarCancion(204);
reproductor.crearPlaylist("exitos 3023");