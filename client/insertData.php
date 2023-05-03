<?php
include '../php/connexion.php';

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['Telephone']) || empty($_POST['Adress'])) {
    $_SESSION['status'] = "les information vide";
    $_SESSION['status_code'] = "error";

} elseif(isset($_POST['BTNAJOUTER'])) {

    // Get data from textfield
    $nom = trim($_POST['Nom']);
    $prenom = trim($_POST['Prenom']);
    $telephone = trim($_POST['Telephone']);
    $adresse = trim($_POST['Adress']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.client WHERE Nom=? AND Prenom=? AND Telephone=? AND Address=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($nom, $prenom, $telephone, $adresse));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "daja";
        $_SESSION['status_code'] = "error";
    
    } else {

        // Insert data to table Client
        $sql = "INSERT INTO $database.client (Nom, Prenom, Telephone, Address) VALUES(?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['Telephone'],
            $_POST['Adress']
        ));

        if ($req->rowCount() != 0) {
            $_SESSION['status'] = "Writed";
            $_SESSION['status_code'] = "success";
            $_POST = array(); // Clear the form fields
        
        } else {
            $_SESSION['status'] = "didn't write";
            $_SESSION['status_code'] = "error";
        
        }
    }
}

header('Location: ../php/clients.php');