<?php
ob_start();
session_start();

$username = $_SESSION["authenticatedUser"];
$username = $_SESSION["admin"];
$_SESSION["message"] =  "User $username has logged out"; //terminates both admin and user session

session_destroy();

// Relocate back to the login page
header("Location: login.php");
?> 
