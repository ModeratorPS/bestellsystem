<?php
$DB_HOST = "";

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die("Unable to Connect to ". $DB_HOST. "");
mysqli_select_db($link, $DB_NAME) or die("Could not open the db ". $DB_NAME ."");
?>