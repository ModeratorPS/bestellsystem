<?php
require_once "config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];

$sql1 = "SELECT * FROM `users` WHERE `username` = \"$input1\"";
$db_erg1 = mysqli_query( $link, $sql1 );

while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
    $sqlextra2 = "UPDATE `users` SET `bewerten_rang`=\"$input2\" WHERE `username` = \"$input1\"";
    $db_ergextra2 = mysqli_query( $link, $sqlextra2 );
}

header('location: admin.php');
?>