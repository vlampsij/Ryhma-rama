<?php session_start();

session_unset();
session_destroy();
header("location: http://localhost/vlampsij.github.io/backend/login.php");
?>