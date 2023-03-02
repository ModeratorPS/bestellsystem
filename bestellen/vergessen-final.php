<?php
require_once "config.php";

$input1 = $_GET['mail'];

$sql1 = "SELECT * FROM `users` WHERE `mail` = \"$input1\"";
$db_erg1 = mysqli_query( $link, $sql1 );

session_start();

$_SESSION["loggedin"] = true;

while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
    $_SESSION["id"] = $zeile['id'];
    $_SESSION["username"] = $zeile['username'];
}

header("location: reset-password.php");
?>