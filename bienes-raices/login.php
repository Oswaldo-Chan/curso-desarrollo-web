<?php
    require 'includes/config/database.php';
    $db = connectDB();
    //autenticar el usuario
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db,filter_var( $_POST['email'],FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errors[] = "El email es obligatorio o no es válido";
        }
        if (!$password) {
            $errors[] = "El password es obligatorio";
        }
    }

    require 'includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section content-center">
        <h1>LOGIN</h1>
        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="form" novalidate>
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

<?php
    includeTemplate('footer');
?>
