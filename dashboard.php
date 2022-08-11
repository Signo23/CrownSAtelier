<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nav"] = "navbar.php";
$templateParams["nome"] = "./template/dashboard.php";
$templateParmas["css"] = "dashboard.css";

if(isset($_GET['id'])){
    $templateParams["page"] = './template/dashboard/dashboard-'.$_GET['id'].'.php';
    if($_GET['id'] == "notification") {
        if($_SESSION['tipo'] == "cliente"){
            $templateParams['notication'] = $dbh->notificationForUser($_SESSION['id'], -1);
        } else {
            $templateParams['notication'] = $dbh->notificationForSeller($_SESSION['id'], -1);
        }
    } else if ($_GET['id'] == "user-order") {
        $templateParams['orders'] = $dbh->orderForUser($_SESSION['id']);
    } else if ($_GET['id'] == "seller-order") {
        if(isset($_POST['idOrder'])) {
            $dbh->sendItemOfOrder($_POST['idOrder'], $_POST['idSeller'], $_POST['idItem']);
        }
        $templateParams['orders'] = $dbh->orderForSeller($_SESSION['id']);
    }
}
$templateParams["dashboardNav"] = './template/dashboard/dashboard-'.$_SESSION["tipo"].'-nav.php';


//Categorie Template
require 'template/base.php';
?>