<?php
include '../easly/connexion.php';
session_start();
var_dump($_POST);

if (isset($_POST['ajoutercmd'])) {
    // Get data from textfields
    $id_comd = $_POST['id']; // Handle the case when 'id' is not set in $_GET
    $date = trim($_POST['date']);
    $optionvalue = trim($_POST['optionvalue']);

    // Update data in the commandes table
    $sql = "UPDATE $database.commandes SET date = :date, statu = :optionvalue WHERE ID = :id_comd";
    $req = $connexion->prepare($sql);
    $req->execute(array(
        'date' => $date,
        'optionvalue' => $optionvalue,
        'id_comd' => $id_comd
    ));

    if ($req->rowCount() != 0) {
        // Update data in the facture table
        $updateFactureSql = "UPDATE $database.facture SET date = :date WHERE id_commandes = :id_comd";
        $updateFactureStmt = $connexion->prepare($updateFactureSql);
        $updateFactureStmt->execute(array(
            'date' => $date,
            'id_comd' => $id_comd
        ));

        if ($updateFactureStmt->rowCount() != 0) {
            $_SESSION['status'] = "Les données ont été mises à jour avec succès";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['status'] = "Erreur lors de la mise à jour de la facture";
            $_SESSION['status_code'] = "error";
        }
    }

    // Insert data into the 'article de commande' table
    if (!empty($_POST["idar"]) && !empty($_POST["Qty"])) {
        $hasError = false; // Initialize the error status variable

        for ($k = 0; $k < count($_POST['idar']); $k++) {
            $id = $_POST["idar"][$k];
            $qte = $_POST["Qty"][$k];
            $pr = $_POST["prix"][$k];
            $tot = $_POST["ttl"][$k];

            // Check if the entered quantity is greater than the available quantity
            $selectSql = "SELECT Quantite FROM `$database`.`article` WHERE ID = ?";
            $selectStmt = $connexion->prepare($selectSql);
            $selectStmt->execute([$id]);
            $row = $selectStmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $availableQuantity = $row['Quantite'];

                if ($qte <= $availableQuantity) {
                    // Update the quantity in the database
                    $updateSql = "UPDATE `$database`.`article` SET Quantite = Quantite - ? WHERE ID = ?";
                    $updateStmt = $connexion->prepare($updateSql);
                    $updateStmt->execute([$qte, $id]);

                    // Insert data into article de commande table
                    $insertArticleSql = "INSERT INTO `$database`.`article de commande` (id_commandes, id_article, Quantite, Price, Total) VALUES (?, ?, ?, ?, ?)";
                    $insertArticleStmt = $connexion->prepare($insertArticleSql);
                    $insertArticleStmt->execute([$id_comd, $id, $qte, $pr, $tot]);
                } else {
                    // Quantity is not available
                    $_SESSION['status'] = "La quantité demandée n'est pas disponible pour l'article avec l'ID $id";
                    $_SESSION['status_code'] = "error";
                    $hasError = true; // Set error status to true
                    break; // Exit the loop
                }
            } else {
                // Invalid article ID
                $_SESSION['status'] = "L'article avec l'ID $id n'existe pas";
                $_SESSION['status_code'] = "error";
                $hasError = true; // Set error status to true
                break; // Exit the loop
            }
        }

        if (!$hasError) {
            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
        }
    }
}

header('Location: ../easly/Commandes.php');
