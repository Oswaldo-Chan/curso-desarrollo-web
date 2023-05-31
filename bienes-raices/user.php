<?php
//conectar db
require 'includes/app.php';
$db = connectDB();
//crear email y password
$email = 'correo@correo.com';
$password = 'qwerty123';
$passwordHash = password_hash($password,PASSWORD_DEFAULT);
//query para crear usuario
$query = "INSERT INTO usuarios (email, password) ";
$query .= "VALUES ('{$email}','{$passwordHash}')";
//agregarlo a la base de datos
mysqli_query($db,$query);