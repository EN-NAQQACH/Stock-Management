<?php
$connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');


$searchkey = $_POST['name'];
$sql = "SELECT * FROM article WHERE CONCAT(Nom_Article) LIKE '%$searchkey%'";
$result = mysqli_query($connection, $sql);
$data = array(); // Initialize an empty array
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row; // Add each row to the $data array
?>
        <tr onclick="displayProductValues(this)" id="clicked-two">
            <td scope="row" style="border:1px solid #ddd;"><?php echo $row->ID ?></td>
            <td style="border:1px solid #ddd;"><?php echo $row->Nom_Article ?></td>
            <td style="border:1px solid #ddd;"><?php echo $row->Categorie ?></td>
            <td style="border:1px solid #ddd;">
                <?php
                if ($row->Quantite == 0) {
                ?> <span style="display: flex;justify-content: center;">
                        <h6 style="color:red">Alerts stock</h6>
                    </span> <?php
                        } elseif ($row->Quantite < 0) {
                            echo $row->Quantite = '<span style="display: flex;justify-content: center;"><h6 style="color:red">Alerts stock/h6></span>';
                        } else {
                            echo $row->Quantite;
                        }
                            ?>

            </td>
            <td style="border:1px solid #ddd;"><?php echo number_format($row->PrixUnitaire, 2)  ?></td>
            <td style="border:1px solid #ddd;">
                <?php if (!empty($row->image)) { ?>
                    <div style="display: flex;justify-content: center;">
                        <img src="<?php echo "../upload/" . $row->image ?>" alt="Product Image" width="50px" height="50px" style="border-radius: 10%;">
                    </div>
                <?php } else { ?>
                    No image
                <?php } ?>

            </td>

        </tr>
    <?php
    }
} else {
    ?>
    <td style="text-align: center;border:1px solid #ddd;" colspan="4">Liste Vide</td>
<?php }
echo json_encode($data);
?>