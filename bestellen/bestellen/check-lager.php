<?php
require_once "../config/config.php";

$artikel = str_replace("%20", " ", $_GET['artikel']);
$anz = str_replace("%20", " ", $_GET['anz']);

$query = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$artikel\"";
$result = mysqli_query($link, $query); 
while($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    if ($zeile['lager'] > 0) {
        if (intval($zeile['lager']) - $anz <= 0) {
            echo "NO";
        } else {
            echo "YES";
        } 
    } else if ($zeile['lager'] == 0) {
        echo "NO";
    } else {
        echo "YES";
    }
}