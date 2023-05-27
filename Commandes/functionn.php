<?php
$connection = mysqli_connect("localhost", "root", "", "ggestion_stock");

if (isset($_POST["action"])){
  if($_POST["action"] == "delete"){
    delete();
  } 
} 

function delete() {
  global $connection;
  $id = $_POST["id"];
  $result = mysqli_query($connection, "DELETE FROM `article de commande fornisseur`
  WHERE `id_commandes` IN (
    SELECT cmd.`No`
    FROM `commandesfornissuer` AS cmd
    JOIN `fornisseur` AS fr ON cmd.`ID_Fornisseur` = fr.`ID`
    WHERE fr.`ID` IN (
      SELECT cmd.`ID_Fornisseur`
      FROM `article de commande fornisseur` AS ac
      JOIN `commandesfornissuer` AS cmd ON ac.`id_commandes` = cmd.`No`
      WHERE ac.`id_article` = $id
    )
  )
  AND `id_article` = $id;");
    
  if ($result) {
    echo json_encode(1);
  } else {
    echo json_encode(0);
  }
}
?>