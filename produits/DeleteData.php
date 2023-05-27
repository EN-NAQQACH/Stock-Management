<?php
include '../easly/connexion.php';
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
        // Get the image filename from the database
        $sql = "SELECT image FROM $database.article WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
    
        if ($row) {
            $imageFilename = $row['image'];
            // Delete the image file from the folder
            $imagePath = "../upload/" . $imageFilename;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

    // Delete data from table Client
    $sql = "DELETE FROM $database.article WHERE id = ?";
    $req = $connexion->prepare($sql);
    $req->execute(array($id));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "le Client a été supprimée avec succès";
        $_SESSION['status_code'] = "success";
    }
}

header('Location: ../easly/produits.php');
