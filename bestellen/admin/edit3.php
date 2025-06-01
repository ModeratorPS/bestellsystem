<?php
require_once "../config/config.php";
$input1 = $_POST['input1'];
$query = "UPDATE `bestellungen` SET `Status` = '3' WHERE `ID` = \"$input1\" AND `Status` = '2'"; 
$result = mysqli_query($link, $query); 
if ($result) {
    header("location: index.php");
} else {
 	echo 'Fehler beim bearbeiten!';
}
?>