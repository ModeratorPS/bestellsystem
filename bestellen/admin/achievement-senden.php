<?php
require_once "../config/config.php";

$query = 'SELECT * FROM `achievement`';
$result = mysqli_query($link, $query);
foreach ($result as $zeile) {
    $id = $zeile["id"];
    $value = $_POST[$id];
    $query_update = "UPDATE `achievement` SET `count`='$value' WHERE `id`='$id'";
    $result_update = mysqli_query($link, $query_update);
}

header('location: index.php');
?>