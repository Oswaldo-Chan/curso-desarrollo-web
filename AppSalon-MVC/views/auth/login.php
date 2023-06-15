<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>

<?php include_once __DIR__."/../templates/alertas.php" ?>

<form action="/" method="POST" class="form">
    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="ingrese su correo">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="ingrese su contraseña">
    </div>

    <input type="submit" class="btn" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href='/crear-cuenta'>¿Aún no tienes una cuenta?</a>
    <a href='/password-olvidado'>¿Olvidaste tu contraseña?</a>
</div>