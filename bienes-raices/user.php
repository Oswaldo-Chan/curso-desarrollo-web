<?php
//conectar db
require 'includes/config/database.php';
$db = connectDB();
//crear email y password
$email = 'correo@correo.com';
$password = 'qwerty123';
//query para crear usuario
$query = "INSERT INTO usuarios (email, password) ";
$query .= "VALUES ('{$email}','{$password}')";
//agregarlo a la base de datos
mysqli_query($db,$query);