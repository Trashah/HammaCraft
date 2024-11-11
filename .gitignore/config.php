<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HammaCraft";

//Create connection
function connectToDatabase () {
    global $servername, $username, $password, $dbname;
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