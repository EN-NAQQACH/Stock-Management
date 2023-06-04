<?php
$connection = mysqli_connect("localhost", "root", "", "ggestion_stock");

if (isset($_POST["action"]) && $_POST["action"] == "delete") {
  delete();
}

function delete() {
  global $connection;
  $id = $_POST["id"];
  
  // Create a temporary table to store the IDs of the records to be deleted
  $tempTableQuery = "CREATE TEMPORARY TABLE temp_id
  SELECT cmd.`ID`
  FROM `commandes` AS cmd
  JOIN `client` AS cl ON cmd.`ID_Client` = cl.`ID`
  WHERE cl.`ID` IN (
    SELECT cmd.`ID_Client`
    FROM `article de commande` AS ac
    JOIN `commandes` AS cmd ON ac.`id_commandes` = cmd.`ID`
    WHERE ac.`id_article` = $id
  )";
  
  if (mysqli_query($connection, $tempTableQuery) === FALSE) {
    echo json_encode(0);
    return;
  }
  
  // Delete the records from the main table based on the temporary table
  $deleteQuery = "DELETE FROM `article de commande`
  WHERE `id_commandes` IN (SELECT `ID` FROM temp_id)
  AND `id_article` = $id";
  
  $result = mysqli_query($connection, $deleteQuery);
  
  if ($result) {
    echo json_encode(1);
  } else {
    echo json_encode(0);
  }
  
  // Drop the temporary table
  $dropTableQuery = "DROP TEMPORARY TABLE IF EXISTS temp_id";
  mysqli_query($connection, $dropTableQuery);
}

mysqli_close($connection);
?>
