<?php
require_once "../config/config.php";
$sql = "SELECT * FROM `status_rst`";
$result = mysqli_query( $link, $sql );
foreach ($result as $zeile) {
    echo $zeile['Status'];
}