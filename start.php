<?php
session_start();
define("UPLOAD_DIR", "./resources/img/products/");
define("DIR_CORONE", "corone/");
define("DIR_VESTITI", "vestiti/");
define("DIR_FESTONI", "festoni/");
define("DIR_BOUQUET", "bouquet/");

require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("127.0.0.1", "root", "Adminroot", "my_crownsatelier", 3306);
?>