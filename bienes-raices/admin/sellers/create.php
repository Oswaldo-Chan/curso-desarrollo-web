<?php
    require '../../includes/app.php';
   
    use App\Seller;

    userAuth();

    $seller = new Seller();
    $errors = Seller::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $seller = new Seller($_POST['seller']);

        $errors = $seller->validate();

        if (empty($errors)) {
            $seller->save();
        }
    }

    includeTemplate('header');
?>

<main class="container section">
        <h1>Registrar Vendedor</h1>

        <a href="/admin" class="btn btn-purple">Regresar</a>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST" action="/admin/sellers/create.php">
           
            <?php include '../../includes/templates/sellersForm.php' ?>

            <input type="submit" value="Registrar Vendedor" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
