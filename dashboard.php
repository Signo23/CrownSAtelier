<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nav"] = "navbar.php";
$templateParams["navClass"] = "sticky-top";
$templateParams["nome"] = "dashboard.php";
$templateParmas["css"] = "dashboard.css";

if(isset($_GET['id'])){
    $templateParams["page"] = './template/dashboard/dashboard-'.$_GET['id'].'.php';
}


//Categorie Template
$templateParams["dashboardNav"] = './template/dashboard/dashboard-'.$_SESSION["tipo"].'-nav.php';
require 'template/base.php';
?>