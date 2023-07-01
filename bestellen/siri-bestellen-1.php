<?php
require_once "config/config.php";

session_start();

$art = str_replace("%20", " ", $_GET['artikel']);

$query1 = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$art\"";
$result1 = mysqli_query($link, $query1); 
$num_rows1 = mysqli_num_rows( $result1 ); 
if ($num_rows1 == 1) {
  while($zeile = mysqli_fetch_array( $result1, MYSQLI_ASSOC))
  {
    echo 'Meinst du '.$zeile['artikel'].' welche '.$zeile['preis'].' Euro kostet?';
  }
} else if ($num_rows1 > 1) {
  while($zeile = mysqli_fetch_array( $result1, MYSQLI_ASSOC))
  {
    echo $zeile['artikel'].' welche '.$zeile['preis'].' Euro kostet.<br>';
  }
} else {
  echo 'Es wurde kein Artikel mit den Namen '.$art.' gefunden!<br>';
  echo "Ich starte die Bestellung von vorne!";
}
?> 