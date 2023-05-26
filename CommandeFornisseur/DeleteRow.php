<?php
include '../easly/connexion.php';
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete data from table Client
    $sql = "DELETE FROM `article de commande fornisseur`
    WHERE `id_commandes` IN (
      SELECT cmd.`No`
      FROM `commandesfornissuer` AS cmd
      JOIN `fornisseur` AS fr ON cmd.`ID_Fornisseur` = fr.`ID`
      WHERE fr.`ID` IN (SELECT cmd.`ID_Fornisseur`
                       FROM `article de commande fornisseur` AS ac
                       JOIN `commandesfornissuer` AS cmd ON ac.`id_commandes` = cmd.`No`
                       WHERE ac.`id_article` =  $id)
    )
    AND `id_article` =  $id";

try {
    $connexion->exec($sql);
} catch(PDOException $e) {
    echo "Error deleting row: " . $e->getMessage();
}

// Close the database connection
$connexion = null;

}


?>