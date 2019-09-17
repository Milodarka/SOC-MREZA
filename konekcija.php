<?php


$servername = "localhost";
$username = "milena";
$password = "pera";
$database = "mreza";

    global $conn;
    $conn = new mysqli($servername, $username,
        $password, $database);
    
    if($conn->connect_error)
    {
        die("Neuspela  konekcija! Razlog: "
            . $conn->connect_error);
    }
    $conn->set_charset('utf8');

?>