<?php
include '../php/connexion.php';
session_start();
var_dump($_POST);
// Check if the textfields are not empty
if (empty($_POST['ID_clinet']) || empty($_POST['date']) || empty($_POST['optionvalue']) || empty($_POST['idarticle']) || empty($_POST['Quantitearticle'])) {
    $_SESSION['status'] = "Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['ajoutercmd'])) {
    // Get data from textfields
    $idclient = trim($_POST['ID_clinet']);
    $date = trim($_POST['date']);
    $optionvalue = trim($_POST['optionvalue']);


    $majmo3 = count($_POST['idarticle']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.commandes WHERE ID_Client=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($idclient));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    } else {
        // Insert data into commandes table
        $sql = "INSERT INTO $database.commandes (`date`, ID_Client, statu) VALUES (?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            $date,
            $idclient,
            $optionvalue
        ));

            // Get the ID of the inserted row in commandes table
            $commandeId = $connexion->lastInsertId();
            for($i =0 ; $i<$majmo3; $i++){
                $sql = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES ('$commandeId', '{$_POST['productId'][$i] }', '{$_POST['quantityy'][$i] }', '{$_POST['price'][$i] }', '{$_POST['totalpr'][$i] }')";
               $connexion->query($sql);
                
            }
            // Insert data into article de commande table


            if ($req->rowCount() != 0){

                $_SESSION['status'] = "Les données ont été insérées avec succès";
                $_SESSION['status_code'] = "success";
                $_POST = array(); // Clear the form fields
            } else {
                $_SESSION['status'] = "Echec d'insertion des données";
                $_SESSION['status_code'] = "error";
            }
    }
}

header('Location: ../easly/Commandes.php');
