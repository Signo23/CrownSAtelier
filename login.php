<?php
require_once 'start.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_res = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_res)==0) {
        $templateParmas["errore"] = 'Errore password!';
    }
    else{
        registerLoggedUser($login_res[0]);
    }
}

if(isUserLoggedIn()){
    //Base Template
    $templateParams["titolo"] = "Crown's Atelier";
    $templateParams["nav"] = "navbar.php";
    $templateParams["nome"] = "categorie-in.php";
    //Categorie Template
    $templateParams["categorie"] = $dbh->getCategories();
    require 'template/base.php';
} else {
    $templateParams["titolo"] = "Crown's Atelier - Login";
    $templateParams["nome"] = "login.php";
    $templateParmas["css"] = "login.css";
    require 'template/no-nav-base.php';
}


?>