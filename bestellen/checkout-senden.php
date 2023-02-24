<?php
require_once "config.php";

$input1_un = $_GET['name'];
$input1 = str_replace("%20", " ", $input1_un);

$query = "DELETE FROM `checkout` WHERE `name` = \"$input1\""; 
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