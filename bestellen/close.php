<?php
require_once "config.php";

$query = "DELETE FROM `status_rst` WHERE `Status` = \"Geöffnet\"";
$result = mysqli_query($link, $query); 

if( $result )
 {
 	echo '1: Gesendet!';
 }
 else
 {
 	echo '1: Query Failed';
 }

$query2 = "INSERT INTO `status_rst` (`Status`) VALUES ('Geschlossen');"; 
$result2 = mysqli_query($link, $query2); 

if( $result2 )
 {
 	echo '2: Gesendet!';
 }
 else
 {
 	echo '2: Query Failed';
 }
?>
<html>
	<head>
        <title>Eingabe-Info</title>
        <link rel="stylesheet" href="style_system.css">
    </head>
	<a href="/bestellen/admin.php">back to Home</a>
</html>