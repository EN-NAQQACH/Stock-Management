<?php
use FontLib\Table\Type\post;

include '../easly/connexion.php';
session_start();
var_dump($_POST);
// Check if the textfields are not empty
if (empty($_POST['ID_fr']) || empty($_POST['date'])) {
    $_SESSION['status'] = "Veuillez saisir les données: N° Fornisseur, Date";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['addorder'])) {
    // Get data from textfields
    $idfr = trim($_POST['ID_fr']);
    $date = trim($_POST['date']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.commandesfornissuer WHERE ID_Fornisseur=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($idfr));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "la commande ou le N° commande existe déjà";
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
                        $insertCommandeSql = "INSERT INTO $database.commandesfornissuer (`date`, ID_Fornisseur) VALUES (?, ?)";
                        $insertCommandeStmt = $connexion->prepare($insertCommandeSql);
                        $insertCommandeStmt->execute([$date, $idfr]);
                        $commandeId = $connexion->lastInsertId();

                       /* $insertFactureSql = "INSERT INTO $database.facture (`no_client`, `date`, `id_commandes`) VALUES (:idclient, :date, :commandeId)";
                        $insertFactureStmt = $connexion->prepare($insertFactureSql);
                        $insertFactureStmt->bindParam(':idclient', $idclient);
                        $insertFactureStmt->bindParam(':date', $date);
                        $insertFactureStmt->bindParam(':commandeId', $commandeId);
                        $insertFactureStmt->execute();*/

                    }

                    // Insert data into article de commande table
                    $insertArticleSql = "INSERT INTO `$database`.`article de commande fornisseur` (id_commandes, id_article, Quantite, Price, Total) VALUES (?, ?, ?, ?, ?)";
                    $insertArticleStmt = $connexion->prepare($insertArticleSql);
                    $insertArticleStmt->execute([$commandeId, $id, $qte, $pr, $tot]);
                } else {
                    // Quantity is not available
                    $_SESSION['status'] = "La quantité demandée n'est pas disponible pour l'article avec N°: $id";
                    $_SESSION['status_code'] = "error";
                    // You can redirect the user back to the form or display the error message as needed
                    // header('Location: ../path/to/form.php');
                    // exit;
                    $error = true;
                    break;
                    header('Location: ../CommandeFornisseur/FormulaireCommandes.php');
                    
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
            header('Location: ../CommandeFornisseur/FormulaireCommandes.php');
            exit;
        } else {
            $_SESSION['status'] = "La quantité demandée n'est pas disponible pour l'article avec le N°: $id";
            $_SESSION['status_code'] = "error";
            header('Location: ../CommandeFornisseur/FormulaireCommandes.php');
            exit;
        }
    }
}

header('Location: ../CommandeFornisseur/FormulaireCommandes.php');