<?php
$connection = mysqli_connect("localhost", "root", "", "ggestion_stock");

if (isset($_POST["action"]) && $_POST["action"] == "delete") {
  delete();
}

function delete() {
  global $connection;
  $id = $_POST["id"];
  $result = mysqli_query($connection, "DELETE FROM `article de commande`
    WHERE `id_commandes` IN (
      SELECT cmd.`ID`
      FROM `commandes` AS cmd
      JOIN `client` AS cl ON cmd.`ID_Client` = cl.`ID`
      WHERE cl.`ID` IN (SELECT cmd.`ID_Client`
                       FROM `article de commande` AS ac
                       JOIN `commandes` AS cmd ON ac.`id_commandes` = cmd.`ID`
                       WHERE ac.`id_article` = $id)
    )
    AND `id_article` = $id");
    
  if ($result) {
    echo json_encode(1);
  } else {
    echo json_encode(0);
  }
}
?>