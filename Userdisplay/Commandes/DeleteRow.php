<?php
include '../php/connexion.php';
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete data from table Client
    $sql = "DELETE FROM `article de commande`
    WHERE `id_commandes` IN (
      SELECT cmd.`ID`
      FROM `commandes` AS cmd
      JOIN `client` AS cl ON cmd.`ID_Client` = cl.`ID`
      WHERE cl.`ID` IN (SELECT cmd.`ID_Client`
                       FROM `article de commande` AS ac
                       JOIN `commandes` AS cmd ON ac.`id_commandes` = cmd.`ID`
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