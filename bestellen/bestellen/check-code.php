<?php
require_once "../config/config.php";

$code = str_replace("%20", " ", $_GET['code']);

$sql = "SELECT * FROM `rabattcodes` WHERE `code` = '$code'";

$result = mysqli_query( $link, $sql );

$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
    foreach ($result as $zeile) {
        echo $zeile['rabatt'];
    }
} else {
    echo 0;
}