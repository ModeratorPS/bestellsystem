<?php
require_once "config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$input3 = $_POST['input3'];
$input4 = $_POST['input4'];
$input5 = $_POST['input5'];
$input6 = $_POST['input6'];
$input7 = $_POST['input7'];
$input8 = $_POST['input8'];
$input9 = $_POST['input9'];
$input10 = $_POST['input10'];
$input11 = $_POST['input11'];
$input12 = $_POST['input12'];
$input13 = $_POST['input13'];

$query = "INSERT INTO `Artikelliste` (`artikel`, `bild`, `width`, `height`, `beschreibung`, `Gruppe`, `Kidsmode`, `TG`, `preis`, `lager`, `time`, `bedingung`, `extra_info_bedingung`) VALUES ('$input1', '$input2', '$input3', '$input4', '$input5', '$input6', '$input7', '$input8', '$input10', '$input9', '$input11', '$input12', '$input13');";
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