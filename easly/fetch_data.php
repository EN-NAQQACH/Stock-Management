<?php
include '../easly/connexion.php';
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
$k = $_POST['id'];
$k = trim($k);
$sql = "SELECT * FROM client WHERE ID ='{$k}'";
$result = mysqli_query($connection, $sql);

$data = []; // Initialize an empty array
if ($result && mysqli_num_rows($result) > 0) {
while($rows = mysqli_fetch_array($result)){
    $data['Nom'] = $rows["Nom"];
}
}
echo json_encode($data);

?>
