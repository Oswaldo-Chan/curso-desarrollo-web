<?php
    //DATABASE
    require '../../includes/config/database.php';
    $db = connectDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $rooms = $_POST['rooms'];
        $wc = $_POST['wc'];
        $parking = $_POST['parking'];
        $seller = $_POST['seller'];

        //insert to db
        $query = " INSERT INTO propiedades (nombre, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id)";
        $query .= " VALUES ('$title', '$price', '$description', '$rooms', '$wc', '$parking', '$seller')";

        $result = mysqli_query($db, $query);

        if ($result) {
            echo "Insertado Correctamente";
        }
    }

    require '../../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Crear</h1>

        <a href="/admin" class="btn btn-purple">Regresar</a>

        <form class="form" method="POST" action="/admin/properties/create.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="title">Titulo:</label>
                <input type="text" id="title" name="title" placeholder="Titulo de la propiedad">

                <label for="price">Precio:</label>
                <input type="number" id="price" name="price" placeholder="precio de la propiedad">

                <label for="image">Imagen:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Descripcion:</label>
                <textarea id="description" name="description"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="rooms">Habitaciones:</label>
                <input type="number" id="rooms" name="rooms" placeholder="Ej: 5" min="1" max="10">
            
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 5" min="1" max="10">

                <label for="parking">Estacionamiento:</label>
                <input type="number" id="parking" name="parking" placeholder="Ej: 5" min="1" max="10">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="seller">
                    <option value="1">Oswaldo</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
