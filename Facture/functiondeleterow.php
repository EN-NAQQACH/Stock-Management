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
  SELECT f.`No`
  FROM `facture` AS f
  JOIN `client` AS cl ON f.`no_client` = cl.`ID`
  WHERE cl.`ID` IN (
    SELECT f.`no_client`
    FROM `article de facture` AS ac
    JOIN `facture` AS f ON ac.`id_facture` = f.`No`
    WHERE ac.`id_article` = $id
  )";
  
  if (mysqli_query($connection, $tempTableQuery) === FALSE) {
    echo json_encode(0);
    return;
  }
  
  // Delete the records from the main table based on the temporary table
  $deleteQuery = "DELETE FROM `article de facture`
  WHERE `id_facture` IN (SELECT `No` FROM temp_id)
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
