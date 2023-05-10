<?php 

function connectDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

    if (!$db) {
        echo "error trying to connect to database";
        exit;
    } 

    return $db;
}