<?php include_once __DIR__.'/header.php'; ?>

    <div class="contenedor-sm">
        <?php include_once __DIR__.'/../templates/alertas.php' ?>
        
        <a href="/perfil" class="enlace">Volver al Perfil</a>

        <form method="POST" class="formulario" action="/cambiar-password">
            <div class="campo">
                <label for="passwordActual">Password Actual</label>
                <input type="password" name="passwordActual" placeholder="Ingrese su password actual">
            </div>
            <div class="campo">
                <label for="passwordNuevo">Nuevo Password</label>
                <input type="password" name="passwordNuevo" placeholder="Ingrese su nuevo password">
            </div>
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>

<?php include_once __DIR__.'/footer.php'; ?>