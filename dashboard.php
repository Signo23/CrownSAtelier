<?php
    require_once 'start.php';

    //Base Template
    $templateParams["titolo"] = "Crown's Atelier";
    $templateParams["nav"] = "navbar.php";
    $templateParams["nome"] = "./template/dashboard.php";
    $templateParams["css"] = "dashboard.css";
    $templateParams["js"] = "form-validation.js";

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
    } else {
        $templateParams["page"] = './template/dashboard/dashboard-'.$_SESSION['tipo'].'.php';
    }
    if(isset($_GET['form'])){
        $templateParams["page"] = ('./template/dashboard/product/product-form.php');
    }
    //SALVATAGGIO PRODOTTI
    if(isset($_POST['save'])){
            debug_to_console("1");
            if($_POST['save'] == 1){
            debug_to_console(basename($_FILES['formFile']["name"]));
            debug_to_console("2");
            $new = $dbh->addNewProduct($_POST['nome'], $_POST['descrizione'], basename($_FILES['formFile']["name"]), (int)$_POST['tag']);
            uploadImage(UPLOAD_DIR . $dbh->getCategoryDir((int)$_POST['tag']), $_FILES["formFile"]);
            $dbh->addItemForSeller($_SESSION['id'], $new, (float)$_POST['price'], (int)$_POST['qnt']);
        } else if($_POST['save'] == 2) {
            debug_to_console("3");
            debug_to_console((int)$_POST['qnt']);
            $dbh->editItemForSeller($_SESSION['id'], $_POST['prod'], (float)$_POST['price'], (int)$_POST['qnt']);
        } else {
            debug_to_console("4");
            $dbh->addItemForSeller($_SESSION['id'], $_POST['prod'], (float)$_POST['price'], (int)$_POST['qnt']);
        }
    }
    $templateParams["dashboardNav"] = './template/dashboard/dashboard-'.$_SESSION["tipo"].'-nav.php';


    //Categorie Template
    require 'template/base.php';
?>