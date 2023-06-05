<?php
    require '../../includes/app.php';
   
    use App\Seller;

    userAuth();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    $seller = Seller::find($id);
    $errors = Seller::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $args = $_POST['seller'];
        $seller->sync($args);
        
        $errors = $seller->validate();

        if (empty($errors)) {
            $seller->save();
        }
    }

    IncludeTemplate('header');
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
