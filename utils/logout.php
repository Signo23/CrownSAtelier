<?php
require_once '../start.php';

unset($_SESSION['id']);
session_destroy();
header("Location: ../index.php");
?>