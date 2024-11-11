<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HammaCraft";

//Create connection
function connectToDatabase () {
    global $servername, $username, $password, $dbname;
    static $connection;
    if ($connection == NULL) $connection = new mysqli($servername, $username, $password, $dbname);
    return $connection;
}