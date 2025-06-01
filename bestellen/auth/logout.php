<?php
require_once "../config/config.php";

session_start();

setcookie("login_cookie", "", time() - 1);
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../index.php");

exit;
?>