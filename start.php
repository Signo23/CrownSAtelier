<?php
session_start();
//define("UPLOAD_DIR", "./upload/");
require_once("utils/functions.php");
debug_to_console('Start.php/require functions...ok');
require_once("db/database.php");
debug_to_console('Start.php/require database...ok');
$dbh = new DatabaseHelper("127.0.0.1", "root", "root", "my_crownsatelier", 3306);
debug_to_console('Start.php/create connection to DB...ok');
debug_to_console('Start.php...ok');
?>