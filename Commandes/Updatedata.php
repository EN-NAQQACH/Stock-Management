<?php
include '../php/connexion.php';
session_start();
var_dump($_POST);

if (isset($_POST['ajoutercmd'])) {
    // Get data from textfields
    $id_comd = $_POST['id'] ; // Handle the case when 'id' is not set in $_GET
    $date = trim($_POST['date']);
    $optionvalue = trim($_POST['optionvalue']);


        // Update data in the commandes table
        $sql = "UPDATE $database.commandes SET date = :date, statu = :optionvalue WHERE ID = :id_comd";
        $req = $connexion->prepare($sql);
        $req->execute(array(
            'date' => $date,
            'optionvalue' => $optionvalue,
            'id_comd' => $id_comd
        ));
        if ($req->rowCount() != 0){

            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
        }
        
        // Insert data into the 'article de commande' table
        if (!empty($_POST['productId']) || !empty($_POST['quantityy'])) {
            $majmo3 = count($_POST['productId']);
            $idartcile = trim($_POST['productId']);
            $sql = "SELECT * FROM $database.commandes WHERE ID_Client=?";
            $req = $connexion->prepare($sql);
            $req->execute(array($idclient));
        
            if ($req->rowCount() > 0) {
                $_SESSION['status'] = "Les données existent déjà dans la base de données";
                $_SESSION['status_code'] = "warning";
            } 
            for ($i = 0; $i < $majmo3; $i++) {
                $sql = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES ('$id_comd', '{$_POST['productId'][$i] }', '{$_POST['quantityy'][$i] }', '{$_POST['price'][$i] }', '{$_POST['totalpr'][$i] }')";
                $connexion->query($sql);
        }
        if ($req->rowCount() != 0){

            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
        }
        
}




}
header('Location: ../php/Commandes.php');

