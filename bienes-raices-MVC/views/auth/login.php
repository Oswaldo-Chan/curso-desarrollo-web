<h1>Login</h1>

<main class="container section content-center">
    <h1>LOGIN</h1>
    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="form" novalidate action="/login">
        <fieldset>
            <legend>Email & Password</legend>
            <label for="email">Correo</label>
            <input name="email" type="email" placeholder="Ingrese su correo" id="email">
            <label for="password">Constraseña</label>
            <input name="password" type="password" placeholder="Ingrese su contraseña" id="password">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="btn btn-purple">
    </form>
</main>