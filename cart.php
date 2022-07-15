<?php
require_once 'start.php';

if userLoggedIn(){
    echo $dbh->cartTotal($_SESSION["id"]);
    echo $dbh->cartItems($_SESSION["id"]);    
}

?>
