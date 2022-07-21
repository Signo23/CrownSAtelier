<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nav"] = "navbar.php";
$templateParams["nome"] = "./template/dashboard.php";
$templateParmas["css"] = "dashboard.css";

if(isset($_GET['id'])){
    $templateParams["page"] = './template/dashboard/dashboard-'.$_GET['id'].'.php';
}
$templateParams["dashboardNav"] = './template/dashboard/dashboard-'.$_SESSION["tipo"].'-nav.php';


//Categorie Template
require 'template/base.php';
?>