<div class="contenedor restablecer">

<?php include_once __DIR__.'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu nuevo password</p>
        
        <?php include_once __DIR__.'/../templates/alertas.php'; ?>

        <?php if($mostrar): ?>

        <form action="/restablecer" method="POST" class="formulario">
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su password">
            </div>
            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password" id="password2" name="password2" placeholder="Repite tu password">
            </div>

            <input type="submit" class="boton" value="Restablecer">
        </form>
        
        <?php endif; ?>

        <div class="acciones">
            <a href="/crear">¿Aún no tienes una cuenta? obtén una</a>
            <a href="/olvide">¿Olvidaste tu password? restablecer password</a>
        </div>
    </div> <!-- contenedor sm -->
</div>