<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nome"] = "categorie-in.php";
//Categorie Template
$templateParams["categorie"] = $dbh->getCategories();
require 'template/base.php';
?>