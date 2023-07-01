<?php
require_once "../config/config.php";
$name = $_GET['name'];
$status = $_GET['status'];

if ($status == "on") {
    $new = "off";
} else if ($status == "off") {
    $new = "on";
}

if ($new == "on") {
    $new_s = "off";
}
if ($new == "off") {
    $new_s = "error";
}

$sql2 = "SELECT * FROM `module` WHERE `abhaengig` = \"$name\"";
$sql2_result = mysqli_query($link, $sql2);
while ($zeile = mysqli_fetch_array( $sql2_result, MYSQLI_ASSOC)) {
    if ($zeile['status'] == "on") {
        header('location: module.php?error='.$zeile['name']);
        return;
    }
    $name_n = $zeile['name'];
    $sql3 = "UPDATE `module` SET `status` = \"$new_s\" WHERE `name` = \"$name_n\"";
    $sql_result3 = mysqli_query($link, $sql3);
}

$sql = "UPDATE `module` SET `status` = \"$new\" WHERE `name` = \"$name\"";
$sql_result = mysqli_query($link, $sql);
header('location: module.php');
?>