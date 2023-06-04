<?php
include '../easly/connexion.php';
session_start();

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['categorie']) || empty($_POST['quantite']) || empty($_POST['prix']) || empty($_POST['No'])) {
    $_SESSION['status'] = " Veuillez saisir les données";
    $_SESSION['status_code'] = "info";

} elseif(isset($_POST['BTNAJOUTER'])) {

    // Get data from textfield
    $no = $_POST['No'];
    $nom = $_POST['Nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $image = $_FILES["imageupload"]['name'];
    /*$date = $_POST['date'];*/
    $img_name= $_FILES['imageupload'] ['name'];
    $tmp_img_name= $_FILES['imageupload'] ['tmp_name'];
    $folder = '../upload/';



    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.article WHERE ID=? AND Nom_Article=? AND Categorie=? AND Quantite=? AND PrixUnitaire=?  or Nom_Article=? or ID=? ";
    $req = $connexion->prepare($sql);
    $req->execute(array($no, $nom, $categorie, $quantite, $prix, $nom, $no));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    
    } else {

        // Insert data to table Client
        $sql = "INSERT INTO $database.article (ID, Nom_Article, Categorie, Quantite, PrixUnitaire, image) VALUES(?, ?, ?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array($no, $nom, $categorie, $quantite, $prix, $image));

        if ($req->rowCount() != 0) {
            move_uploaded_file($_FILES['imageupload'] ['tmp_name'],"../upload/".$img_name= $_FILES['imageupload'] ['name']); 
            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
            $_POST = array(); // Clear the form fields
        } else {
            $_SESSION['status'] = "Echec d'insertion des données";
            $_SESSION['status_code'] = "error";
        }
    }
}

header('Location: ../produits/FormulaireProduit.php');