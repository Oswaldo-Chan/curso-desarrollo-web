<?php
    //DATABASE
    require '../../includes/config/database.php';
    $db = connectDB();
    
    //query sellers
    $query = "SELECT * FROM vendedores";
    $result = mysqli_query($db,$query);

    //array with error messages
    $errors = [];

    $title = '';
    $price = '';
    $description = '';
    $rooms = '';
    $wc = '';
    $parking = '';
    $seller = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $rooms = $_POST['rooms'];
        $wc = $_POST['wc'];
        $parking = $_POST['parking'];
        $seller = $_POST['seller'];
        $date = date('Y/m/d');

        if (!$title) {
            $errors[] = "Debes agregar un titulo";
        }
        if (!$price) {
            $errors[] = "El precio es obligatorio";
        }
        if (!$description) {
            $errors[] = "Necesitas agregar una descripcion";
        } else if (strlen($description) < 20) {
            $errors[] = "La descripcion debe tener al menos 20 caracteres";
        } else if (strlen($description) > 200) {
            $errors[] = "La descripcion no debe exceder los 200 caracteres";
        }
        if (!$rooms) {
            $errors[] = "El numero de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errors[] = "El numero de baños es obligatorio";
        }
        if (!$parking) {
            $errors[] = "El numero de lugares de estacionamiento es obligatorio";
        }
        if (!$seller) {
            $errors[] = "Elige un vendedor";
        }

        
        if (empty($errors)) {
            //insert to db
            $query = " INSERT INTO propiedades (nombre, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)";
            $query .= " VALUES ('$title', '$price', '$description', '$rooms', '$wc', '$parking', '$date', '$seller')";

            $result = mysqli_query($db, $query);

            if ($result) {
                header('Location: /admin');
            }
        }
    }

    require '../../includes/functions.php';
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

        <form class="form" method="POST" action="/admin/properties/create.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="title">Titulo:</label>
                <input type="text" id="title" name="title" placeholder="Titulo de la propiedad" value="<?php echo $title; ?>">

                <label for="price">Precio:</label>
                <input type="number" id="price" name="price" placeholder="precio de la propiedad" value="<?php echo $price; ?>">

                <label for="image">Imagen:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

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

                <select name="seller">
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
