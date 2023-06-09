<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php include_once __DIR__."/../templates/alertas.php" ?>

<form action="/crear-cuenta" method="POST" class="form">
    <div class="field">
        <label for="nombre">Nombre</label>
        <input value="<?php echo sanitizar($usuario->nombre) ?>" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
    </div>
    <div class="field">
        <label for="apellido">Apellido</label>
        <input value="<?php echo sanitizar($usuario->apellido) ?>" type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">
    </div>
    <div class="field">
        <label for="telefono">Teléfono</label>
        <input value="<?php echo sanitizar($usuario->telefono) ?>" type="tel" id="telefono" name="telefono" placeholder="Ingrese su telefono">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input value="<?php echo sanitizar($usuario->email) ?>" type="email" id="email" name="email" placeholder="Ingrese su correo">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
    </div>

    <input type="submit" value="Crear Cuenta" class="btn">
</form>

<div class="acciones">
    <a href='/'>¿Ya tienes una cuenta? Inicia sesión</a>
    <a href='/password-olvidado'>¿Olvidaste tu contraseña?</a>
</div>