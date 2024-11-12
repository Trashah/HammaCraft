<?php

function connectToDatabase () {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HammaCraft";
    static $connection;

    if ($connection == NULL) {
        mysqli_report(MYSQLI_REPORT_OFF);
        $connection = new mysqli($servername,  
                                 $username, 
                                 $password, 
                                 $dbname);

        if ($connection -> connect_error) {
            die("Error de conexion: ". $connection -> connect_error);
        }
    }
    
    return $connection;
}