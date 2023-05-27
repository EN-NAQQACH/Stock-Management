<?php
include '../easly/connexion.php';
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$k = $_POST['id'];
$k = trim($k);
$sql = "SELECT * FROM fornisseur WHERE ID ='{$k}'";
$result = mysqli_query($connection, $sql);
while($rows = mysqli_fetch_array($result)){
    $data['Nom'] = $rows["Nom"];
    $data['Prenom'] = $rows["Prenom"];
}
echo json_encode($data);

?>

