<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];

$query = "INSERT INTO `news-mails` (`mails`) VALUES ('$input1');";
$result = mysqli_query($link, $query); 
if( $result )
 {
 	echo 'Keine Fehler beim Senden!';
 }
 else
 {
 	echo 'Fehler beim Senden!';
 }
?>
<a href="/bestellen/index.php">back</a>