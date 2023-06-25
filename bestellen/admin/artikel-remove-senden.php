<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];

$query = "DELETE FROM `Artikelliste` WHERE `artikel` = \"$input1\""; 
$result = mysqli_query($link, $query); 
if( $result )
 {
	header('location: index.php');
 }
 else
 {
 	echo 'Fehler beim Löschen!';
 }
?>