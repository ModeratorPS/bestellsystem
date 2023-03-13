<?php
require_once "../config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];

$query = "INSERT INTO `bewertungen` (`username`, `text`) VALUES ('$input2', '$input1');"; 
$result = mysqli_query($link, $query); 
if( $result )
 {
	header("location: index.php");
 }
 else 
 {
 	echo 'Fehler beim Senden!';
 }
?>