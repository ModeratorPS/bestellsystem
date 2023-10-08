<?php
require_once "../config/config.php";

$input1_un = str_replace("%20", " ", $_GET['name']);
$input1 = explode(" - ", $input1_un);
$lastElement = end($input1);

$query = "SELECT * FROM `checkout`"; 
$result = mysqli_query($link, $query);

foreach ($result as $zeile) {
    $input2 = explode(" - ", $zeile['name']);
    $name = $zeile['name'];
    $lastElement2 = end($input2);
    if ($lastElement == $lastElement2) {
        $query = "DELETE FROM `checkout` WHERE `name` = '$name'";
        mysqli_query($link, $query);
    }
}

header("location: index.php");
?>