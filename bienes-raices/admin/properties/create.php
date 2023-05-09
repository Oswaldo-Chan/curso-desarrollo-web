<?php
    //DATABASE
    require '../../includes/config/database.php';
    $db = connectDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST['title']);
        echo "</pre>";

        $title = $_POST['title'];
        $price = $_POST['price'];

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
                <textarea id="description"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="rooms">Habitaciones:</label>
                <input type="number" id="rooms" placeholder="Ej: 5" min="1" max="10">
            
                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej: 5" min="1" max="10">

                <label for="parking">Estacionamiento:</label>
                <input type="number" id="parking" placeholder="Ej: 5" min="1" max="10">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option value="1">Oswaldo</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="btn btn-yellow">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>
