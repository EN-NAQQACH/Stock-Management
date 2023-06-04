<?php
use FontLib\Table\Type\post;

include '../easly/connexion.php';
session_start();
var_dump($_POST);
// Check if the textfields are not empty
if (empty($_POST['ID_clinet']) || empty($_POST['date'])) {
    $_SESSION['status'] = "Veuillez saisir les données: N° client, Date";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['addorder'])) {
    // Get data from textfields
    $idclient = trim($_POST['ID_clinet']);
    $date = trim($_POST['date']);

    // Check if the data already exists in the database
    $sql = "SELECT * FROM $database.facture WHERE no_client=?";
    $req = $connexion->prepare($sql);
    $req->execute(array($idclient));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "Les données existent déjà dans la base de données";
        $_SESSION['status_code'] = "warning";
    } else {
        $factureId = null; // Initialize the variable to hold the command ID
        $error = false;

        // Loop through the articles
        for ($k = 0; $k < count($_POST['idar']); $k++) {
            $id = $_POST["idar"][$k];
            $qte = $_POST["Qty"][$k];
            $pr = $_POST["prix"][$k];
            $tot = $_POST["ttl"][$k];

            // Insert data into commandes table (if not already inserted)
            if (!$factureId) {
                $insertfacturesql = "INSERT INTO $database.facture (`date`, no_client) VALUES (?, ?)";
                $insertCommandeStmt = $connexion->prepare($insertfacturesql);
                $insertCommandeStmt->execute([$date, $idclient]);
                $factureId = $connexion->lastInsertId();
            }

            // Insert data into article de commande table
            $insertArticleSql = "INSERT INTO `$database`.`article de facture` (id_facture, id_article, price, Quantite, Total) VALUES (?, ?, ?, ?, ?)";
            $insertArticleStmt = $connexion->prepare($insertArticleSql);
            $insertArticleStmt->execute([$factureId, $id, $pr, $qte,  $tot]);
        }

        $_SESSION['status'] = "Les données ont été insérées avec succès";
        $_SESSION['status_code'] = "success";
        $_POST = array(); // Clear the form fields
    }
}

header('Location: ../Facture/FormulaireFacture.php');
