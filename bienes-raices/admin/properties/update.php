<?php

use App\Property;

require '../../includes/app.php';

    userAuth();

    $propertyID = $_GET['id'];
    $propertyID = filter_var($propertyID, FILTER_VALIDATE_INT);
    
    if (!$propertyID) {
        header('Location: /admin');
    }

    //get property
    $property = Property::find($propertyID);

    //query sellers
    $query = "SELECT * FROM vendedores";
    $result = mysqli_query($db,$query);

    //array with error messages
    $errors = Property::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['property'];
        
        $property->sync($args);
        
        $errors = $property->validate();
       
        if (empty($errors)) {
            
            //make dir
            $folder = '../../img/';

            if (!is_dir($folder)) {
                mkdir($folder);
            }

            $imageName = '';

            if ($image['name']) {
                //delete previous image
                unlink($folder.$property['imagen']);
                //generating a unique name
                $imageName = md5(uniqid(rand(), true)).".jpg";
                //upload image
                move_uploaded_file($image['tmp_name'], $folder.$imageName);
            } else {
                $imageName = $property['imagen'];
            }
            
            //insert to db
            $query = "UPDATE propiedades SET nombre = '{$title}', precio = '{$price}', imagen = '{$imageName}', 
            descripcion = '{$description}', habitaciones = {$rooms}, wc = {$wc}, estacionamiento = {$parking}, vendedores_id = {$seller} WHERE id = {$propertyID}";
            
            $result = mysqli_query($db, $query);

            if ($result) {
                header('Location: /admin?result=2');
            }
        }
    }

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="btn btn-purple">Regresar</a>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/propertiesForm.php' ?>
            <input type="submit" value="Actualizar Propiedad" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>

