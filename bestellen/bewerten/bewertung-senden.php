<?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  header('location: ../index.php');
}

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$starsValue = $_POST['starsValue'];

$query = "INSERT INTO `bewertungen` (`username`, `text`, `stars`) VALUES ('$input2', '$input1', '$starsValue');"; 
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