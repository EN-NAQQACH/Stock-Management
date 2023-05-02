<?php
include '../php/connexion.php';

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['Telephone']) || empty($_POST['Adress'])) {
    echo "les informations sont vide";
} else {

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
        echo "Les données existent déjà dans la base de données.";
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
            echo "writed";
            $_POST = array(); // Clear the form fields
        } else {
            echo "didn't write";
        }
    }
}
