<?php
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');


$searchkey = $_POST['name'];
$sql = "SELECT cmd.ID, c.Nom, cmd.date
        FROM commandes AS cmd
        JOIN client AS c ON cmd.ID_Client = c.ID
        WHERE CONCAT(cmd.ID, c.Nom) LIKE '%$searchkey%'";

$result = mysqli_query($connection, $sql);
$data = array(); // Initialize an empty array
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row; // Add each row to the $data array
        ?>
                                    <tr>
                                        <th scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></th>
                                        <td style="border:1px solid #ddd;"><?php echo $row->Nom ?></td>
                                        <td style="border:1px solid #ddd;"><?php echo $row->date ?></td>
                                        <td style="text-align: center;">
                                            <div style="display: flex;justify-content: space-around;align-items: center;">
                                                <a href="../Commandes/Formulaire de Modification.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color: black;font-size: 1.2rem;" title="edit"><i class='bx bx-pencil'></i></a>
                                                <form action="../Commandes/Display_commandes.php" method="post">
                                                    <a href="../Commandes/Display_commandes.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color:green;font-size: 1.2rem;"><i class='bx bxs-show'></i></a>
                                                </form>
                                                <a href="../Commandes/DeleteData.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color: red;font-size: 1.2rem;"><i class='bx bx-x-circle'></i></a>
                                                <a href="../Commandes/export-commandes.php?id=<?php echo $row->ID; ?>" style="text-decoration: none;color:black;font-size: 1.2rem;"><i class='bx bxs-printer'></i></a>
                                            </div>
                                        </td>
                                    </tr>
        <?php
    }
}else {
    ?>
    <td style="text-align: center;border:1px solid #ddd;padding:120px;" colspan="5">Liste Vide</td>
<?php }
echo json_encode($data);
?>
