<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nav"] = "navbar.php";
$templateParams["navClass"] = "sticky-top";
$templateParams["nome"] = "dashboard-fornitore.php";
$templateParmas["css"] = "dashboard.css";


//Categorie Template
require 'template/base.php';
?>