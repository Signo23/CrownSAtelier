<?php
require_once '../start.php';

unset($_SESSION['email']);
session_destroy();
header("Location: ../index.php");
?>