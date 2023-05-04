<?php
include '../php/connexion.php';

//vfunction to get data from table CLIENT

function gatFornisseur()
{
    $SQL = "SELECT * FROM fornisseur";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}