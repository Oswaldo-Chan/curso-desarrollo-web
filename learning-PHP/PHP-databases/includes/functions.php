<?php

function getServices() {
    try {
        //importar credenciales
        require 'database.php';
        //SQL queries
        $query = 'SELECT * FROM servicios';
        //realizar el query
        $result = mysqli_query($DBconnected,$query);
        //retornar resultado
        return $result;
        //cerrar la conexion
        mysqli_close($DBconnected);
    } catch (\Throwable $th) {
        
    }
}

getServices();