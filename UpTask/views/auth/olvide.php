<div class="contenedor olvide">

<?php include_once __DIR__.'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso en UpTask</p>
        
        <?php include_once __DIR__.'/../templates/alertas.php'; ?>

        <form action="/olvide" method="POST" class="formulario" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su email">
            </div>

            <input type="submit" class="boton" value="Envíar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/crear">¿Aún no tienes una cuenta? Crea Una</a>
        </div>
    </div> <!-- contenedor sm -->
</div>