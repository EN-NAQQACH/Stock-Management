<?php
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');


$searchkey = $_POST['name'];
$sql = "SELECT * FROM client WHERE CONCAT(Nom) LIKE '%$searchkey%'";
$result = mysqli_query($connection, $sql);
$data = array(); // Initialize an empty array
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row; // Add each row to the $data array
        ?>
        <tr onclick="displayRowValues(this)" id="clicked-one">
            <td scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></td>
            <td style="border:1px solid #ddd;"><?php echo $row->Nom ?></td>
            <td style="border:1px solid #ddd;"><?php echo $row->Telephone ?></td>
            <td style="border:1px solid #ddd;"><?php echo $row->Address ?></td>
        </tr>
        <?php
    }
}else {
    ?>
    <td style="text-align: center;border:1px solid #ddd;" colspan="4">Liste Vide</td>
<?php }
echo json_encode($data);
?>
