<?php
require_once 'start.php';
debug_to_console('Creating params...');

//Base Template
$templateParams["titolo"] = "Crown's Atelier";
$templateParams["nome"] = "categorie-in.php";
//Categorie Template
$templateParams["categorie"] = $dbh->getCategories();
debug_to_console('Params created');
require 'template/base.php';
debug_to_console('base.php...ok');
?>