<meta charset="UTF-8">
<?php
require_once "../config/config.php";

$artikel = str_replace("%20", " ", $_GET['artikel']);
$anz = str_replace("%20", " ", $_GET['anz']);

$query = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$artikel\"";
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    $new = $zeile['lager'] - intval($anz);
}

$query = "UPDATE `Artikelliste` SET `lager`=\"$new\" WHERE `artikel` = \"$artikel\""; 
$result = mysqli_query($link, $query);