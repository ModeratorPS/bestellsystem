<?php
require_once "../config/config.php";
$name = str_replace("%20", " ", $_GET['name']);
$status = $_GET['status'];
$action = $_GET['action'];

if ($action == "ch") {
    if ($status == "on") {
        $new = "off";
    } else if ($status == "off") {
        $new = "on";
    }
    $sql = "UPDATE `tische` SET `status` = \"$new\" WHERE `nummer` = \"$name\"";
    $sql_result = mysqli_query($link, $sql);
} else if ($action == "del") {
    $sql = "DELETE FROM `tische` WHERE `nummer` = \"$name\"";
    $sql_result = mysqli_query($link, $sql);
} else if ($action == "new") {
    $name = $_POST['name'];
    $sql = "INSERT INTO `tische`(`nummer`, `status`) VALUES ('$name','on')";
    $sql_result = mysqli_query($link, $sql);
}
header('location: tischnummer.php');
?>