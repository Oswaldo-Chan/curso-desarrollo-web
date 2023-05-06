<?php

$DBconnected = mysqli_connect('localhost','root','','appsalon');

if ($DBconnected) {
    echo "Conexion Exitosa";
} else {
    echo "Error con la conexion";
    exit;
}