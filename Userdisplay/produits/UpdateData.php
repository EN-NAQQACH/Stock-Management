<?php
include '../php/connexion.php';
session_start();

var_dump($_POST);

if (empty($_POST['Nom']) || empty($_POST['categorie']) || empty($_POST['quantite']) || empty($_POST['prix']) || empty($_POST['date'])) {
    $_SESSION['status'] = "Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['btn'])) {

    // Get data from textfield
    $id = $_POST['id'];
    $nom = $_POST['Nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];
    $old_image = $_POST['imageupload'];
    $new_image = $_FILES['imageupload']['name'];

    if ($new_image != '') {
        $update_file = $new_image;
        if (file_exists("../upload/" . $new_image)) {
            $fiename = $_FILES['imageupload']['name'];
            $_SESSION['status'] = "Les données existent déjà dans la base de données";
            $_SESSION['status_code'] = "warning";
        }
    } else {
        $update_file = $old_image;
    }

    $connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
    $sql = "UPDATE $database.article SET Nom_Article ='$nom', Categorie ='$categorie', Quantite ='$quantite', PrixUnitaire ='$prix', image ='$update_file' , DateFabrication ='$date' WHERE id ='$id'";
    $run = mysqli_query($connection, $sql);

    if ($run) {
        if ($_FILES['imageupload']['name'] != '') {
            move_uploaded_file($_FILES['imageupload']['tmp_name'], "../upload/" . $_FILES['imageupload']['name']);
            unlink("../upload/" . $old_image);
        }
        $_SESSION['status'] = "Les données ont été mises à jour avec succès";
        $_SESSION['status_code'] = "success";
        $_POST = array(); // Clear the form fields
    } else {
        $_SESSION['status'] = "Echec de la mise à jour des données";
        $_SESSION['status_code'] = "error";
    }
}

header('Location: ../php/produits.php');
