<?php
require_once 'start.php';
debug_to_console('Creating params...');

//Base Template
$templateParams["titolo"] = "Crown's Atelier - Categoria";
$templateParams["nome"] = "listaProdotti.php";
//Categorie Template
require 'template/base.php';
debug_to_console('base.php...ok');
?>