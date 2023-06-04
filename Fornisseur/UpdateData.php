<?php
include '../easly/connexion.php';
session_start();

var_dump($_POST);

if (empty($_POST['Nom']) || empty($_POST['Prenom']) || empty($_POST['Telephone']) || empty($_POST['Adress'])) {
    $_SESSION['status'] = " Veuillez saisir les données";
    $_SESSION['status_code'] = "info";

} elseif(isset($_POST['BTNEDITER'])) {

    // Get data from textfield
    $id = $_GET['id'];
    $nom = trim($_POST['Nom']);
    /*$prenom = trim($_POST['Prenom']);*/
    $telephone = trim($_POST['Telephone']);
    $adresse = trim($_POST['Adress']);

    // Update data in table Client
    $sql = "UPDATE $database.fornisseur SET Nom = ?, Telephone = ?, Address = ? WHERE id = ?";
    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['Nom'],
        /*$_POST['Prenom'],*/
        $_POST['Telephone'],
        $_POST['Adress'],
        $_POST['id'] // Assuming there is an 'id' field in your form
    ));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données ont été mises à jour avec succès";
        $_SESSION['status_code'] = "success";
        $_POST = array(); // Clear the form fields
    }
}

header('Location: ../easly/Fornisseur.php');