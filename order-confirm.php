<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Conferma Ordine";
$templateParmas["css"] = "conferma-ordine.css";
if(isUserLoggedIn()){
    $templateParams["nav"] = "navbar.php";

} else {
    $templateParams["nav"] = "navbar-login.php";
}$templateParams["nome"] = "conferma-ordine.php";
//Categorie Template
$templateParams["categorie"] = $dbh->getCategories();
require 'template/base.php';
?>