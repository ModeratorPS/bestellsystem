<?php
session_start();
if (($_SESSION["loggedin_admin"] !== true) | (!$_SESSION["loggedin_admin"])) {
  header('location: ../index.php');
}
require_once "../config/config.php";

$query = "DELETE FROM `status_rst` WHERE `Status` = \"Geschlossen\"";
$result = mysqli_query($link, $query); 

$query2 = "INSERT INTO `status_rst` (`Status`) VALUES ('Geöffnet');"; 
$result2 = mysqli_query($link, $query2); 

echo "<script>alert('Restaurant geöffnet!'); window.location.href = 'index.php';</script>";
?>