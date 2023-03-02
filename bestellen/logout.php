<?php
// Initialize the session
session_start();

if ($_SESSION["loggedin_admin"] === true) {
    $log = true;
}
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
if ($log === true) {
    header('location: admin-login.php');
} else {
    header("location: login.php");
}

exit;
?>