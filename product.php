<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Prodotto";
if(isUserLoggedIn()){
    $templateParams["nav"] = "navbar.php";

} else {
    $templateParams["nav"] = "navbar-login.php";
}$templateParams["nome"] = "product-view.php";

//Categorie Template
$idcategoria = -1;
$seller = 'null';
if(isset($_GET['id']) && isset($_GET['seller'])){
    $prodotto = $dbh-> getProductData($_GET['id'], $_GET['seller']);
    $templateParams['imgURL'] = $prodotto[0]['imgURL'];
    $templateParams['nomeProdotto'] = $prodotto[0]['nome'];
    $templateParams['descrizione'] = $prodotto[0]['descrizione'];
    $templateParams['prezzo'] = $prodotto[0]['prezzo'];

    $templateParams["venditori"] = $dbh-> getSellerByProductId($_GET['id']);

    if(array_key_exists('addToCart',$_POST)){
        $cart = $dbh-> getProductInCart($_SESSION["id"], $_GET['id'], $_GET['seller']);
        if(count($cart)!=0){
            debug_to_console("Da aggiungere un elemento");
            $dbh-> updateCart($_SESSION["id"], $_GET['id'], $_GET['seller'], $cart[0]['qnt'] + 1); 
        } else {
            debug_to_console("Nuovo elemento nel carrello");
            $dbh-> addToCart($_SESSION["id"], $_GET['id'], $_GET['seller']);
        }
    }
}
require 'template/base.php';
?>