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
    $sql = "UPDATE `alert` SET `status` = \"$new\" WHERE `name` = \"$name\"";
    $sql_result = mysqli_query($link, $sql);
    header('location: alert.php');
} else if ($action == "del") {
    $sql = "DELETE FROM `alert` WHERE `name` = \"$name\"";
    $sql_result = mysqli_query($link, $sql);
    header('location: alert.php');
} else if ($action == "erl") {
    $new = date("Y-m-d H:i:s");
    $sql = "UPDATE `alert` SET `last_active` = \"$new\" WHERE `name` = \"$name\"";
    $sql_result = mysqli_query($link, $sql);
    header('location: index.php');
} else if ($action == "new") {
    $name = $_POST['name'];
    $time = $_POST['time'];
    $new = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `alert`(`name`, `time`, `last_active`, `status`) VALUES ('$name','$time','$new','on')";
    $sql_result = mysqli_query($link, $sql);
    header('location: alert.php');
}
?>