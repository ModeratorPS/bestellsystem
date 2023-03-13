<?php
require_once "config.php";

$query = "DELETE FROM `bestellungen`"; 
$result = mysqli_query($link, $query); 
if( $result )
 {
    header("location: admin.php");
 }
 else
 {
 	echo 'Fehler beim Löschen!';
 }
?>