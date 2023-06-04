<?php /*
include '../easly/connexion.php';
session_start();

var_dump($_POST);

if (empty($_POST['Nom']) || empty($_POST['categorie']) || empty($_POST['quantite']) || empty($_POST['prix']) || empty($_POST['date'])) {
    $_SESSION['status'] = "Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['btn'])) {

    // Get data from textfield
    $id = $_POST['id'];
    $nom = $_POST['Nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];
    $old_image = $_POST['imageupload'];
    $new_image = $_FILES['imageupload']['name'];

    if ($new_image != '') {
        $update_file = $new_image;
        if (file_exists("../upload/" . $new_image)) {
            $fiename = $_FILES['imageupload']['name'];
            $_SESSION['status'] = "Les données existent déjà dans la base de données";
            $_SESSION['status_code'] = "warning";
        }
    } else {
        $update_file = $old_image;
    }

    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');
    $sql = "UPDATE $database.article SET Nom_Article ='$nom', Categorie ='$categorie', Quantite ='$quantite', PrixUnitaire ='$prix', image ='$update_file' , DateFabrication ='$date' WHERE id ='$id'";
    $run = mysqli_query($connection, $sql);

    if ($run) {
        if ($_FILES['imageupload']['name'] != '') {
            move_uploaded_file($_FILES['imageupload']['tmp_name'], "../upload/" . $_FILES['imageupload']['name']);
            unlink("../upload/" . $old_image);
        }
        $_SESSION['status'] = "Les données ont été mises à jour avec succès";
        $_SESSION['status_code'] = "success";
        $_POST = array(); // Clear the form fields
    } else {
        $_SESSION['status'] = "Echec de la mise à jour des données";
        $_SESSION['status_code'] = "error";
    }
}

header('Location: ../easly/produits.php');
*/?>


<?php
include '../easly/connexion.php';
session_start();

var_dump($_POST);

// Check if the textfields are not empty
if (empty($_POST['Nom']) || empty($_POST['categorie']) || empty($_POST['quantite']) || empty($_POST['prix'])) {
    $_SESSION['status'] = "Veuillez saisir les données";
    $_SESSION['status_code'] = "info";
} elseif (isset($_POST['btn'])) {

    // Get data from textfield
    $id = $_POST['id'];
    $nom = $_POST['Nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
   /* $date = $_POST['date'];*/
    $old_image = $_POST['imageupload'];

    $connection = mysqli_connect('localhost', 'root', '', 'ggestion_stock');

    if (isset($_FILES['imageupload']) && $_FILES['imageupload']['error'] === UPLOAD_ERR_OK) {
        // New image file was uploaded
        $new_image = $_FILES['imageupload']['name'];
        $update_file = $new_image;

        if (file_exists("../upload/" . $new_image)) {
            $fiename = $_FILES['imageupload']['name'];
            $_SESSION['status'] = "Les données existent déjà dans la base de données";
            $_SESSION['status_code'] = "warning";
        } else {
            move_uploaded_file($_FILES['imageupload']['tmp_name'], "../upload/" . $_FILES['imageupload']['name']);
            unlink("../upload/" . $old_image);
        }
    } else {
        // No new image file was uploaded, keep the old image
        $update_file = $old_image;
    }

    // Only update image column if the user selected a new image
    $update_image = isset($_FILES['imageupload']) && $_FILES['imageupload']['error'] === UPLOAD_ERR_OK ? ", image ='$update_file'" : "";

    $sql = "UPDATE $database.article SET Nom_Article ='$nom', Categorie ='$categorie', Quantite ='$quantite', PrixUnitaire ='$prix' $update_image WHERE id ='$id'";
    $run = mysqli_query($connection, $sql);

    if ($run) {
        $_SESSION['status'] = "Les données ont été mises à jour avec succès";
        $_SESSION['status_code'] = "success";
        $_POST = array(); // Clear the form fields
    } else {
        $_SESSION['status'] = "Echec de la mise à jour des données";
        $_SESSION['status_code'] = "error";
    }
}

header('Location: ../easly/produits.php');


