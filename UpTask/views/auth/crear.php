<div class="contenedor crear">

<?php include_once __DIR__.'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en UpTask</p>
        
        <?php include_once __DIR__.'/../templates/alertas.php'; ?>

        <form action="/crear" method="POST" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $usuario->nombre; ?>" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input value="<?php echo $usuario->email ?>" type="email" id="email" name="email" placeholder="Ingrese su email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su password">
            </div>
            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password" id="password2" name="password2" placeholder="Repite tu password">
            </div>

            <input type="submit" class="boton" value="Crear Cuenta">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/olvide">¿Olvidaste tu password? restablecer password</a>
        </div>
    </div> <!-- contenedor sm -->
</div>