<?php

use FontLib\Table\Type\post;

include '../php/connexion.php';
session_start();
var_dump($_POST);
// Check if the textfields are not empty
if (empty($_POST['ID_clinet']) || empty($_POST['date']) || empty($_POST['optionvalue'])) {
    $_SESSION['status'] = "Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['addorder'])) {
    // Get data from textfields





    $idclient = trim($_POST['ID_clinet']);
    $date = trim($_POST['date']);
    $optionvalue = trim($_POST['optionvalue']);




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

        /*$sql2 = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES ";
                $rows=[];
                for($k =0; $k<count($_POST['idar']);$k++){
                    $id=$_POST["idar"][$k];
                    $pr=$_POST["prix"][$k];
                    $qte=$_POST["Qty"][$k];
                    $tot=$_POST["ttl"][$k];
                    $rows[]="('{$commandeId}','{$id}','{$pr}','{$qte}','{$tot}')";
                }
                $sql2 = implode(",",$rows);
               $connexion->query($sql2);*/


        /*for($i =0 ; $i<count($_POST['idar']); $i++){
                $sql = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES ('$commandeId', '{$_POST["idar"][$k] }', '{$_POST["prix"][$k] }', '{$_POST["Qty"][$k] }', '{$_POST["ttl"][$k] }')";
               $connexion->query($sql);
                
            }*/

        $sql2 = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES ";
        $rows = array();
        $params = array();

        for ($k = 0; $k < count($_POST['idar']); $k++) {
            $id = $_POST["idar"][$k];
            $qte = $_POST["Qty"][$k];
            $pr = $_POST["prix"][$k];
            $tot = $_POST["ttl"][$k];

            $rows[] = "(?, ?, ?, ?, ?)";
            $params[] = $commandeId;
            $params[] = $id;
            $params[] = $qte;
            $params[] = $pr;
            $params[] = $tot;
        }

        $sql2 .= implode(", ", $rows);
        $stmt = $connexion->prepare($sql2);
        $stmt->execute($params);


        // Insert data into article de commande table


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

header('Location: ../php/Commandes.php');
