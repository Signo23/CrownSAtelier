<?php
require_once 'start.php';
debug_to_console('Creating params...');

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Categoria";
$templateParams["nome"] = "listaProdotti.php";

//Categorie Template
$idcategory = -1;
if(isset($_GET["search"])){
    $templateParams["search"] = $_GET["search"];
}
if(isset($_GET["id"])){
    $templateParams["prodotti"] = $dbh-> getProductByCategory($_GET["id"]);
}

require 'template/base.php';
debug_to_console('base.php...ok');
?>