<h1 class="nombre-pagina">Reestablecer Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

<?php include_once __DIR__."/../templates/alertas.php" ?>

<form action="/password-olvidado" method="POST" class="form">
    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo">
    </div>

    <input type="submit" class="btn" value="Enviar">
</form>

<div class="acciones">
    <a href='/'>¿Ya tienes una cuenta? Inicia sesión</a>
    <a href='/crear-cuenta'>¿Aún no tienes una cuenta?</a>
</div>