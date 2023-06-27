<h1 class="nombre-pagina">Crear Servicio</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir un nuevo servicio</p>

<?php 
    include_once __DIR__.'/../templates/barra.php'; 
    include_once __DIR__.'/../templates/alertas.php'; 
?>

<form action="/servicios/crear" method="POST" class="form">
    <?php include_once __DIR__.'/form.php'; ?>
    <input type="submit" class="btn" value="Guardar Servicio">
</form>