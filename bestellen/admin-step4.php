<?php
require_once "config.php";

$input1 = $_POST['input1'];

$query = "UPDATE `bestellungen` SET `Status` = '3' WHERE `Name` = \"$input1\" AND `Status` = '2'"; 
$result = mysqli_query($link, $query); 
if( $result )
 {
    header("location: admin.php");
 }
 else
 {
 	echo 'Fehler beim bearbeiten!';
 }
?>