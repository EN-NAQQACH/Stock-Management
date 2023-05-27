<?php
session_start(); // Start a session

include '../Users/dbconfig.php';

var_dump($_POST);
if (!isset($_SESSION['ID'])) {
    header("Location: ../Users/Connexion.php"); // Redirect to the login page
    exit();
}
if(isset($_POST['email']) && isset($_POST['password']) ){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        header("Location: ../Users/Connexion.php?error=Oups! L'adresse e-mail et le mot de passe sont manquants");
        exit();
    } elseif(empty($password)){
        header("Location: ../Users/Connexion.php?error=password");
        exit();
    } else {
        $sql = "SELECT * FROM utilisateur";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['role'] == "admin" && $row['Email'] === $email && $row['Mot_de_pass']=== $password){
                header("Location: ../php/Accueil.php");
                exit();
            } else {
                header("Location: ../Users/Connexion.php?error=Oups! L'adresse e-mail ou le mot de passe sont incorrects");
                exit();
            }
        }
    }
}
?>
