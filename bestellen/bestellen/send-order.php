<?php
require_once "../config/config.php";

$name = str_replace("%20", " ", $_GET['name']);
$tisch = str_replace("%20", " ", $_GET['tisch']);
$produkte = str_replace("%20", " ", $_GET['produkte']);
$total = str_replace("%20", " ", $_GET['total']);
$cart = str_replace("%20", " ", $_GET['cart']);

$num_row = 1;
$id = 0;
while ($num_row > 0) {
    $id = rand(1000, 9999);
    $sql_test = "SELECT * FROM `bestellungen` WHERE `ID` = \"$id\"";
    $sql_result = mysqli_query( $link, $sql_test );
    $num_row = mysqli_num_rows($sql_result);
}
echo $id;

$query = "INSERT INTO `bestellungen` (`Name`, `Bestellung`, `ID`, `Status`, `total`, `cart`) VALUES ('$name $tisch', '$produkte', '$id', '0', '$total', '$cart');";
$q = mysqli_query($link, $query);
?>