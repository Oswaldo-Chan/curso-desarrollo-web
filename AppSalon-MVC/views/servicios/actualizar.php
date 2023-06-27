<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica los valores del formulario</p>

<?php 
    include_once __DIR__.'/../templates/barra.php'; 
    include_once __DIR__.'/../templates/alertas.php'; 
?>

<form method="POST" class="form">
    <?php include_once __DIR__.'/form.php'; ?>
    <input type="submit" class="btn" value="Actualizar">
</form>