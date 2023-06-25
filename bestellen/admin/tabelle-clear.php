<?php
require_once "../config/config.php";

$tab = $_GET['tab'];

$query = "DELETE FROM '$tab' WHERE 1"; 
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