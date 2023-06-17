<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>

<?php include_once __DIR__."/../templates/alertas.php" ?>

<?php if($error) return; ?>

<form class="form" method="POST">
    <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su nuevo password">
    </div>
    <input type="submit" class="btn" value="Guardar Nuevo Password">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Obtén una</a>
</div>