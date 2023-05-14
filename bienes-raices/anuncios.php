<?php
    require 'includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h2>Casas y Departamentos en Venta</h2>

        <?php
            include 'includes/templates/properties.php';
        ?>
    </main>
    
<?php
    includeTemplate('footer');
?>