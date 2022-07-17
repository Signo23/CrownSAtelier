<?php
require_once 'start.php';

if (isUserLoggedIn()){
    debug_to_console($dbh->cartTotal($_SESSION["id"]));
    if(array_key_exists('remove', $_POST)){
        $res = $dbh->removeFromCart($_SESSION["id"], $_POST['idSeller'], $_POST['idItem']);
        header("Location: ./cart.php");

    }
    $items = $dbh->cartItems($_SESSION["id"]);
    foreach ($items as $item) {
        debug_to_console($item['idProdotto']);
        debug_to_console($item['idFornitore']);
        debug_to_console($item['qnt']);
        debug_to_console($item);
    }

    //Base Template
    $templateParams["titolo"] = "Crown's Atelier - Carrello";
    $templateParams["nav"] = "navbar.php";
    $templateParams["nome"] = "cart-view.php";

    //Categorie Template
    $templateParams["prodotti"] = $items;
    $templateParams['cartTotal'] = $dbh->cartTotal($_SESSION["id"]);

    require 'template/base.php';
}


?>
