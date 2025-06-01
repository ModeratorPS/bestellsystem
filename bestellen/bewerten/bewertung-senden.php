<?php
require_once "../config/config.php";
$sql_modul = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$sql_modul_result = mysqli_query($link, $sql_modul);
$sql_modul_num_rows = mysqli_num_rows($sql_modul_result);
if ($sql_modul_num_rows == 0) {
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