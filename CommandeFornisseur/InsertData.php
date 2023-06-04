<?php
use FontLib\Table\Type\post;

include '../easly/connexion.php';
session_start();
var_dump($_POST);
// Check if the textfields are not empty
if (empty($_POST['ID_Fr']) || empty($_POST['date']) || empty($_POST['optionvalue'])) {
    $_SESSION['status'] = "Veuillez saisir les données: N° client, Date";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['addorder'])) {
    // Get data from textfields
    $idfr = trim($_POST['ID_Fr']);
    $date = trim($_POST['date']);
    $optionvalue = trim($_POST['optionvalue']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.commandesfornissuer WHERE ID_Fornisseur=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($idfr));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    } else {
        $commandeId = null; // Initialize the variable to hold the command ID
        $error = false;

        // Loop through the articles
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

                    // Insert data into commandes table (if not already inserted)
                    if (!$commandeId) {
                        $insertCommandeSql = "INSERT INTO $database.commandesfornissuer (ID_Fornisseur, `date`, etat) VALUES (?, ?, ?)";
                        $insertCommandeStmt = $connexion->prepare($insertCommandeSql);
                        $insertCommandeStmt->execute([ $idfr, $date, $optionvalue]);
                        $commandeId = $connexion->lastInsertId();

                        /*$insertFactureSql = "INSERT INTO $database.facturefornisseur (`ID_Fornisseur`, `id_commandes`, `date`) VALUES (:idfr, :commandeId, :date)";
                        $insertFactureStmt = $connexion->prepare($insertFactureSql);
                        $insertFactureStmt->bindParam(':idfr', $idfr);
                        $insertFactureStmt->bindParam(':commandeId', $commandeId);
                        $insertFactureStmt->bindParam(':date', $date);
                        $insertFactureStmt->execute();*/

                    }

                    // Insert data into article de commande table
                    $insertArticleSql = "INSERT INTO `$database`.`article de commande fornisseur` (id_article, id_commandes, price, Quantite, Total) VALUES (?, ?, ?, ?, ?)";
                    $insertArticleStmt = $connexion->prepare($insertArticleSql);
                    $insertArticleStmt->execute([$id, $commandeId, $pr, $qte, $tot]);
                } else {
                    // Quantity is not available
                    $_SESSION['status'] = "La quantité demandée n'est pas disponible pour l'article avec N°: $id";
                    $_SESSION['status_code'] = "error";
                    // You can redirect the user back to the form or display the error message as needed
                    // header('Location: ../path/to/form.php');
                    // exit;
                    $error = true;
                    break;
                    header('Location: ../easly/CommandeFornisseur.php');
                    
                }
            } else {
                // Invalid article ID
                $_SESSION['status'] = "L'article avec l'ID $id n'existe pas";
                $_SESSION['status_code'] = "error";
                // You can redirect the user back to the form or display the error message as needed
                // header('Location: ../path/to/form.php');
                // exit;
                $error = true;
            }
        }

        if ($commandeId && !$error) {
            $_SESSION['status'] = "Les données ont été insérées avec succès";
            $_SESSION['status_code'] = "success";
            $_POST = array(); // Clear the form fields
        } elseif ($error) {
            header('Location: ../easly/CommandeFornisseur.php');
            exit;
        } else {
            $_SESSION['status'] = "La quantité demandée n'est pas disponible pour l'article avec le N°: $id";
            $_SESSION['status_code'] = "error";
            header('Location: ../easly/CommandeFornisseur.php');
            exit;
        }
    }
}

header('Location: ../easly/CommandeFornisseur.php');