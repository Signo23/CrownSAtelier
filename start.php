<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("127.0.0.1", "root", "root", "my_crownsatelier", 3306);
?>