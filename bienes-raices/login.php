<?php
    require 'includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section content-center">
        <h1>LOGIN</h1>
        <form class="form">
            <fieldset>
                <legend>Email & Password</legend>
                <label for="email">Correo</label>
                <input type="email" placeholder="Ingrese su correo" id="email">
                <label for="password">Constraseña</label>
                <input type="password" placeholder="Ingrese su contraseña" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="btn btn-purple">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
