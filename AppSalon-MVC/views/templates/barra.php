<div class="barra">
    <p>Hola, <?php echo $nombre ?? '' ?></p>
    <a class="btn" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])): ?>
    <div class="barra-servicios">
        <a href="/admin" class="btn">Ver Citas</a>
        <a href="/servicios" class="btn">Ver Servicios</a>
        <a href="/servicios/crear" class="btn">Crear Servicio</a>
    </div>
<?php endif; ?>