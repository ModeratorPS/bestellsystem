<?php
$DB_HOST = "DATABASE HOST NAME";
$DB_USER = "DATABASE USER NAME";
$DB_PASSWORD = "DATABASE PASSWORD";
$DB_NAME = "DATABASE NAME";
$RESTAURANT_NAME = "XYZ Restaurant";
$MAIL = "mail@xyzrestaurant.de";

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die("Unable to Connect to ". $DB_HOST. "");
mysqli_select_db($link, $DB_NAME) or die("Could not open the db ". $DB_NAME ."");
?>