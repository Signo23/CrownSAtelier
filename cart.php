<?php
require_once 'start.php';

if (isUserLoggedIn()){
    debug_to_console($dbh->cartTotal($_SESSION["id"]));
    $items = $dbh->cartItems($_SESSION["id"]);
    foreach ($items as $item) {
        debug_to_console($item['idProdotto']);
        debug_to_console($item['idFornitore']);
        debug_to_console($item['qnt']);
        debug_to_console($item);
    }
}

?>
