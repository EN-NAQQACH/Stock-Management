<?php
include '../easly/connexion.php';
session_start();
use FontLib\Table\Type\post;
var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['Telephone']) || empty($_POST['Adress']) || empty($_POST['No'])) {
    $_SESSION['status'] = " Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
    header('Location: ../client/FormulaireClient.php');
} elseif(isset($_POST['BTNAJOUTER'])) {

    // Get data from textfield
    $no = trim($_POST['No']);
    $nom = trim($_POST['Nom']);
    $telephone = trim($_POST['Telephone']);
    $adresse = trim($_POST['Adress']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.client WHERE ID=? AND Nom=? AND Telephone=? AND Address=? or ID=? ";
    $req = $connexion->prepare($sql);
    $req->execute(array($no, $nom, $telephone, $adresse, $no));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
        header('Location: ../client/FormulaireClient.php');
    } else {

        // Insert data to table Client
        $sql = "INSERT INTO $database.client (ID, Nom, Telephone, Address) VALUES(?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            $_POST['No'],
            $_POST['Nom'],
            $_POST['Telephone'],
            $_POST['Adress']
        ));

        if ($req->rowCount() != 0) {
            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
            $_POST = array(); // Clear the form fields
            header('Location: ../client/FormulaireClient.php');
        
        } else {
            $_SESSION['status'] = "Echec d'insertion des données";
            $_SESSION['status_code'] = "error";
            header('Location: ../client/FormulaireClient.php');
        }
    }
}

header('Location: ../client/FormulaireClient.php');