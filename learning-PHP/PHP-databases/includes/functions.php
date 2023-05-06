<?php

function getServices() {
    try {
        //importar credenciales
        require 'database.php';
        //SQL queries
        $query = 'SELECT * FROM servicios';
        //realizar el query
        $result = mysqli_query($DBconnected,$query);
        //acceder a los resultados
        echo "<pre>";
        var_dump(mysqli_fetch_assoc($result));
        echo "</pre>";
        //cerrar la conexion
        mysqli_close($DBconnected);
    } catch (\Throwable $th) {
        
    }
}

getServices();