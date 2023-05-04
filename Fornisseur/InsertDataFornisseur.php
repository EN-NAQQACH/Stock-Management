<?php
include '../php/connexion.php';
session_start();

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['Telephone']) || empty($_POST['Adress'])) {
    $_SESSION['status'] = " Veuillez saisir les données";
    $_SESSION['status_code'] = "info";

} elseif(isset($_POST['BTNAJOUTER'])) {

    // Get data from textfield
    $nom = trim($_POST['Nom']);
    $prenom = trim($_POST['Prenom']);
    $telephone = trim($_POST['Telephone']);
    $adresse = trim($_POST['Adress']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.fornisseur WHERE Nom=? AND Prenom=? AND Telephone=? AND Address=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($nom, $prenom, $telephone, $adresse));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    
    } else {

        // Insert data to table Client
        $sql = "INSERT INTO $database.fornisseur (Nom, Prenom, Telephone, Address) VALUES(?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['Telephone'],
            $_POST['Adress']
        ));

        if ($req->rowCount() != 0) {
            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
            $_POST = array(); // Clear the form fields
        
        } else {
            $_SESSION['status'] = "Echec d'insertion des données";
            $_SESSION['status_code'] = "error";
        
        }
    }
}

header('Location: ../php/fornisseur.php');