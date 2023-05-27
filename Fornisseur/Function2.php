<?php
include '../easly/connexion.php';

//vfunction to get data from table CLIENT

function gatFornisseur()
{
    $id = $_GET['id'];
    $SQL = "SELECT * FROM fornisseur WHERE ID=$id";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}