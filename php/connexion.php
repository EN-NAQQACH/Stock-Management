<?php

//Information about database
$servername = "localhost";
$database = "gestion_stock";
$username = "root";
$password = "";

// Try connexion with database
try {
    $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception, This line sets the error mode of the PDO object to ERRMODE_EXCEPTION, 
    //which means that if there is an error during the execution of the PDO, it will throw an exception that can be caught and handled.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //This line returns the PDO object representing the connection if the connection is successful
    return $connexion;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
