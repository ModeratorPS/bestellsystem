<?php
require_once "config/config.php";

session_start();

echo $_SESSION['username'].', ich lese die die Speisekarte vor:<br>';

$query1 = 'SELECT * FROM `Artikelliste` WHERE `lager` != "0"';
$result1 = mysqli_query($link, $query1); 
$num_rows1 = mysqli_num_rows( $result1 ); 
if ($num_rows1 > "0") {
  while($zeile = mysqli_fetch_array( $result1, MYSQLI_ASSOC))
  {
    echo $zeile['artikel'].' kostet '.$zeile['preis'].' Euro.<br>';
  }
} else {
  echo "Das Restaurant hat keine Artikel! Bitte versuche es wann anders nochmal!";
  exit;
}
echo "Ich starte jetzt die Bestellung von vorne!";
?> 