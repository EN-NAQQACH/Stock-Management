<?php
include '../php/connexion.php';
$connection = mysqli_connect('localhost', 'root', '', 'gestion_stock');
$k = $_POST['id'];
$k = trim($k);
$sql = "SELECT * FROM article WHERE ID ='{$k}'";
$result = mysqli_query($connection, $sql);
while($rows = mysqli_fetch_array($result)){
    $data['Nom'] = $rows["Nom_Article"];
    $data['prix'] = $rows["PrixUnitaire"];
}
echo json_encode($data);

?>
