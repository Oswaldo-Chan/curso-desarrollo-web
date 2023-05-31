<?php include 'includes/header.php';

$db = new PDO('mysql:host=localhost; dbname=bienesraices_crud', 'root', '');

$query = "SELECT nombre, imagen from propiedades";

$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $propiedad):
    echo $propiedad['nombre'];
    echo '<br>';
    echo $propiedad['imagen'];
endforeach;

/* echo '<pre>';
var_dump($result);
echo '</pre>'; */

include 'includes/footer.php';