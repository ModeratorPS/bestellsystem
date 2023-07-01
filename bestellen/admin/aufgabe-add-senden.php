<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];

$query2 = "SELECT * FROM `aufgaben`";
$result2 = mysqli_query($link, $query2); 
$num = mysqli_num_rows($result2);

if ($num == 11) {
    echo 'Du hast schon 11 Aufgaben hinzugefügt!';
    exit;
}

$num_add = $num + 1;

$query = "INSERT INTO `aufgaben` (`aufgabe`, `count`, `nr`) VALUES ('$input1', '$input2', '$num_add');";
$result = mysqli_query($link, $query);
if( $result )
 {
 	if ($num_add == 11) {
        header('location: index.php');
    } else {
        header('location: aufgabe-add.php');
    }
 }
 else
 {
 	echo 'Fehler beim Senden!';
 }
?>
<a href="index.php">back</a>