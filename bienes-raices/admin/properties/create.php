<?php
    require '../../includes/app.php';
    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;

    userAuth();

    //DATABASE
    $db = connectDB();
    
    //query sellers
    $query = "SELECT * FROM vendedores";
    $result = mysqli_query($db,$query);

    //array with error messages
    $errors = Property::getErrors();

    $title = '';
    $price = '';
    $description = '';
    $rooms = '';
    $wc = '';
    $parking = '';
    $seller = '';

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
            <fieldset>
                <legend>Información General</legend>

                <label for="title">Titulo:</label>
                <input type="text" id="title" name="title" placeholder="Titulo de la propiedad" value="<?php echo $title; ?>">

                <label for="price">Precio:</label>
                <input type="number" id="price" name="price" placeholder="precio de la propiedad" value="<?php echo $price; ?>">

                <label for="image">Imagen:</label>
                <input type="file" id="image" accept="image/jpeg, image/png" name="image">

                <label for="description">Descripcion:</label>
                <textarea id="description" name="description"><?php echo $description; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="rooms">Habitaciones:</label>
                <input type="number" id="rooms" name="rooms" placeholder="Ej: 5" min="1" max="10" value="<?php echo $rooms; ?>">
            
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 5" min="1" max="10" value="<?php echo $wc; ?>">

                <label for="parking">Estacionamiento:</label>
                <input type="number" id="parking" name="parking" placeholder="Ej: 5" min="1" max="10" value="<?php echo $parking; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedores_id">
                <option value="" selected disabled>-- Seleccione --</option>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <option <?php echo $seller === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']." ".$row['apellido']; ?></option>
                    <?php endwhile ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
