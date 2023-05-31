<?php include 'includes/header.php';
//conectar a la db con Mysqli

//se usa la db del proyecto de bienes raices
$db = new mysqli('localhost','root','','bienesraices_crud');

/* $query = "SELECT nombre from propiedades";
$result = $db->query($query);

while($row = $result->fetch_assoc()) {
    var_dump($row);
} */

$query = "SELECT nombre, imagen from propiedades";
$stmt = $db->prepare($query);

$stmt->execute();
$stmt->bind_result($titulo, $imagen);

while($stmt->fetch()) {
    var_dump($titulo);
    var_dump($imagen);
} 

include 'includes/footer.php';