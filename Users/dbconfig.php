<?php

//Information about database
$servername = "localhost";
$database = "ggestion_stock";
$username = "root";
$password = "";

// Try connexion with database
$con = mysqli_connect($servername,$username,$password,$database);

if(!$con){
    echo "connection fialed";
    exit();
}