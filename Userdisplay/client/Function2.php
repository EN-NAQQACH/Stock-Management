<?php
include '../php/connexion.php';

//vfunction to get data from table CLIENT

function gatClient()
{
    $SQL = "SELECT * FROM client";
    $REQUEST = $GLOBALS['connexion']->prepare($SQL);
    $REQUEST->execute();
    return $REQUEST->fetchAll();
}