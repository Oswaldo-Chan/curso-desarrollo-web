<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /');
    }

    require 'includes/app.php';
    $db = connectDB();

    $query = "SELECT * FROM propiedades WHERE id = {$id}";
    $result = mysqli_query($db, $query);
    if (!$result->num_rows) {
        header('Location: /');
    }
    $property = mysqli_fetch_assoc($result);

    includeTemplate('header');
?>

    <main class="container section content-center">
        <h1><?php echo $property['nombre']?></h1>

            <img loading="lazy" src="/img/<?php echo $property['imagen']?>" alt="property image">

        <div class="property-summary">
            <p class="price">$<?php echo $property['precio']?></p>

            <ul class="details-icons">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                    <p><?php echo $property['wc']?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                    <p><?php echo $property['estacionamiento']?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                    <p><?php echo $property['habitaciones']?></p>
                </li>
            </ul>

            <p><?php echo $property['descripcion']?></p>
        </div>
    </main>
    
<?php
    mysqli_close($db);
    includeTemplate('footer');
?>