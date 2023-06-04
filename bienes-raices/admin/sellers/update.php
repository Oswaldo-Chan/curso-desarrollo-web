<?php
    require '../../includes/app.php';
   
    use App\Seller;

    userAuth();

    $seller = new Seller();
    $errors = Seller::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($errors)) {

            if (!is_dir(FOLDER_IMG)) {
                mkdir(FOLDER_IMG);
            }

            $image->save(FOLDER_IMG.$imageName);
            
            $property->save();
        }

}

includeTemplate('header');
?>

<main class="container section">
        <h1>Actualizar Vendedor</h1>

        <a href="/admin" class="btn btn-purple">Regresar</a>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST">
           
            <?php include '../../includes/templates/sellersForm.php' ?>

            <input type="submit" value="Guardar Cambios" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
