<?php
require_once "config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$input3 = $_POST['input3'];

$query = "INSERT INTO `rabattcodes` (`code`, `rabatt`, `verwendungen`) VALUES ('$input1', '$input2', '$input3');";
$result = mysqli_query($link, $query);
if( $result )
 {
 	header('location: admin.php');
 }
 else
 {
 	echo 'Fehler beim Senden!';
 }
?>
<a href="/bestellen/admin.php">back</a>