<?php
require_once "../config/config.php";

$query = "DELETE FROM `bestellungen`"; 
$result = mysqli_query($link, $query); 
if( $result )
 {
    header("location: index.php");
 }
 else
 {
 	echo 'Fehler beim Löschen!';
 }
?>