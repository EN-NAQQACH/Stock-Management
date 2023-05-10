<?php
include '../php/connexion.php';
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete data from table Client
    $sql = "DELETE FROM $database.client WHERE id = ?";
    $req = $connexion->prepare($sql);
    $req->execute(array($id));

    if ($req->rowCount() > 0) {
        $_SESSION['status'] = "le Client a été supprimée avec succès";
        $_SESSION['status_code'] = "success";
    }
}

header('Location: ../php/clie.php');
?>