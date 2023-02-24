<?php
require_once "config.php";

$input1 = $_POST['input1'];

$query = "DELETE FROM `Artikelliste` WHERE `artikel` = \"$input1\""; 
$result = mysqli_query($link, $query); 
if( $result )
 {
	header('location: admin.php');
 }
 else
 {
 	echo 'Fehler beim Löschen!';
 }
?>
<a href="/bestellen/admin.php">back</a>