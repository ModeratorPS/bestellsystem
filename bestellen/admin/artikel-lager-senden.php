<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];

$query = "UPDATE `Artikelliste` SET `lager`=\"$input2\" WHERE `artikel` = \"$input1\"";
$result = mysqli_query($link, $query);
if( $result )
 {
	header('location: index.php');
 }
 else
 {
 	echo 'Fehler beim Senden!';
 }
?>
<a href="/bestellen/admin.php">back</a>