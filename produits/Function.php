<?php
include '../php/connexion.php';

//function to get data from table article

function gatProduct()
{
    $SQL = "SELECT * FROM article";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}