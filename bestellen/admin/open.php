<?php
require_once "../config/config.php";

$query = "DELETE FROM `status_rst` WHERE `Status` = \"Geschlossen\"";
$result = mysqli_query($link, $query); 

if( $result )
 {
 	echo '1: Gesendet!';
 }
 else
 {
 	echo '1: Query Failed';
 }

$query2 = "INSERT INTO `status_rst` (`Status`) VALUES ('Geöffnet');"; 
$result2 = mysqli_query($link, $query2); 

if( $result2 )
 {
 	echo '2: Gesendet!';
 }
 else
 {
 	echo '2: Query Failed';
 }

$sql1 = "SELECT * FROM `news-mails`";
$db_erg1 = mysqli_query( $link, $sql1 );
 
$betreff = "Restaurant Status News";
$inhalt = "Unser Restaurant hat geöffnet: $MAIL_NEWS_LINK"; 
$header = "From: $MAIL_NEWS"; 
 
if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
echo '<table border="1">';
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  echo "<tr>";
  $adresse = $zeile['mails'];
  @mail($adresse,$betreff,$inhalt,$header);
  echo "</tr>";
}
echo "</table>";
mysqli_free_result( $db_erg1 );
?>
<html>
	<head>
        <title>Eingabe-Info</title>
        <link rel="stylesheet" href="style_system.css">
    </head>
	<a href="index.php">back to Home</a>
</html>