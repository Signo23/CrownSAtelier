<?php
require_once 'start.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_res = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_res)==0) {
        $templateParmas["errore"] = 'Errore! Email o password errati';
    }
    else{
        registerLoggedUser($login_res[0]);
    }
}

if(isUserLoggedIn()){
    header("location: index.php");
} else {
    $templateParams["titolo"] = "Crown's Atelier - Login";
    $templateParams["nome"] = "template/login.php";
    $templateParmas["css"] = "login.css";
    require 'template/no-nav-base.php';
}


?>