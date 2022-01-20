<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Prodotto";
$templateParams["nome"] = "product-view.php";
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
}
require 'template/base.php';
?>