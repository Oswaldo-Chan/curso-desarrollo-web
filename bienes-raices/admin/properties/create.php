<?php
    require '../../includes/app.php';
    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;

    userAuth();

    //DATABASE
    $db = connectDB();

    $property = new Property();
    
    //query sellers
    $query = "SELECT * FROM vendedores";
    $result = mysqli_query($db,$query);

    //array with error messages
    $errors = Property::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $property = new Property($_POST);

        //generating a unique name
        $imageName = md5(uniqid(rand(), true)).".jpg";

        if ($_FILES['image']["tmp_name"]) {
            //upload image
            $image = Image::make($_FILES['image']["tmp_name"])->fit(800, 600);
            $property->setImage($imageName);
        }

        $errors = $property->validate();
        
        if (empty($errors)) {

            if (!is_dir(FOLDER_IMG)) {
                mkdir(FOLDER_IMG);
            }

            $image->save(FOLDER_IMG.$imageName);
            
            $result = $property->save();
 
            if ($result) {
                header('Location: /admin?result=1');
            }
        }
    }

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Crear</h1>

        <a href="/admin" class="btn btn-purple">Regresar</a>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
           
            <?php include '../../includes/templates/propertiesForm.php' ?>

            <input type="submit" value="Crear Propiedad" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
