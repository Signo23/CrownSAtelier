<?php
require_once 'start.php';

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Signin";
if(isset($_GET['id'])){
    $templateParams["nome"] = "signin-" .$_GET['id'] .".php";
    $templateParmas["css"] = "signin.css";

} else {
    $templateParams["nome"] = "signin-choose.php";

}


require 'template/no-nav-base.php';
?>