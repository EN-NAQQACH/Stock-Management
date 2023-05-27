<?php
include '../php/connexion.php';

//vfunction to get data from table CLIENT

function gatClient()
{
    $id = $_GET['id'];

    $SQL = "SELECT * FROM client WHERE ID=$id";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}