<?php

$DBconnected = mysqli_connect('localhost','root','','appsalon');

if (!$DBconnected) {
    echo "Error con la conexión";
    exit;
}