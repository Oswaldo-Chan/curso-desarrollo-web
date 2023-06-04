<?php

use App\Property;

require '../../includes/app.php';
use Intervention\Image\ImageManagerStatic as Image;

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

        //generating a unique name
        $imageName = md5(uniqid(rand(), true)).".jpg";

        if ($_FILES['property']['tmp_name']["image"]) {
            //upload image
            $image = Image::make($_FILES['property']['tmp_name']["image"])->fit(800, 600);
            $property->setImage($imageName);
        }
       
        if (empty($errors)) {   
            $image->save(FOLDER_IMG.$imageName);
            $property->save();
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

