<?php
require_once '../start.php';

unset($_SESSION['email']);
unset($_SESSION['tipo']);
session_destroy();
header("Location: ../index.php");
?>