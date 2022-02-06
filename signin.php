<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Signin";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["nomeNegozio"]) && isset($_POST["indirizzo"])){
    $dbh->signinFornitore($_POST["email"], $_POST["password"], $_POST["telefono"], $_POST["nomeNegozio"], $_POST["indirizzo"]);
    require('login.php');
} elseif(isset($_GET['id'])){
        $templateParams["titolo"] = "Crown's Atelier - Signin ".$_GET['id'];
        $templateParams["nome"] = "signin-" .$_GET['id'] .".php";
        $templateParmas["css"] = "signin.css";
        require 'template/no-nav-base.php';

    } 
     else {
        $templateParams["nome"] = "signin-choose.php";
        require 'template/no-nav-base.php';

    }




?>