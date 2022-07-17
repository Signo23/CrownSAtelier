<?php
require_once 'start.php';

//Base Template
if(isUserLoggedIn()){
    if(array_key_exists('pagamento', $_POST)){
        $res = $dbh->placeOrder($_SESSION["id"]);
        header("Location: ./order-success.php");

    } else {
        $templateParams["titolo"] = "Crown's Atelier - Conferma Ordine";
        $templateParmas["css"] = "conferma-ordine.css";
        $templateParams["nome"] = "conferma-ordine.php";
        //Categorie Template
        $templateParams["nItems"] = $dbh->numberOfItemInCart($_SESSION['id']);
        $templateParams["cartItems"] = $dbh->cartItems($_SESSION['id']);
        $templateParams["cartTotal"] = $dbh->cartTotal($_SESSION['id']);
        require 'template/no-nav-base.php';
    }
} else {
    require './index.php';
}


?>