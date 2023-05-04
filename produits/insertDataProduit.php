<?php
include '../php/connexion.php';
session_start();

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['categorie']) || empty($_POST['quantite']) || empty($_POST['prix']) || empty($_POST['date'])) {
    $_SESSION['status'] = " Veuillez saisir les données";
    $_SESSION['status_code'] = "info";

} elseif(isset($_POST['BTNAJOUTER'])) {

    // Get data from textfield
    $nom = trim($_POST['Nom']);
    $categorie = trim($_POST['categorie']);
    $quantite = trim($_POST['quantite']);
    $prix = trim($_POST['prix']);
    $date = trim($_POST['date']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.article WHERE Nom_Article=? AND Categorie=? AND Quantite=? AND PrixUnitaire=? AND DateFabrication=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($nom, $categorie, $quantite, $prix, $date));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    
    } else {

        // Insert data to table Client
        $sql = "INSERT INTO $database.article (Nom_Article, Categorie, Quantite, PrixUnitaire, DateFabrication) VALUES(?, ?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            $_POST['Nom'],
            $_POST['categorie'],
            $_POST['quantite'],
            $_POST['prix'],
            $_POST['date']
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

header('Location: ../php/produits.php');