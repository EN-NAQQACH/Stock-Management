<?php
include '../easly/connexion.php';

//function to get data from table article

function gatProduct()
{
    $id = $_GET['id'];

    $SQL = "SELECT * FROM article WHERE ID=$id";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}