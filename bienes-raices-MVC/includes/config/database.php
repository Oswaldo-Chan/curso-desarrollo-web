<?php 

function connectDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud', 3306);

    if (!$db) {
        echo "error trying to connect to database";
        exit;
    } 

    return $db;
}