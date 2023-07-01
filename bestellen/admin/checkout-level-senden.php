<?php
require_once "../config/config.php";

$input1 = $_POST['input1'];
$input2 = $_POST['input2'];
$input3 = $_POST['input3'];

$sql1 = "SELECT * FROM `users` WHERE `username` = \"$input3\"";
$db_erg1 = mysqli_query( $link, $sql1 );

while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
    $new = $zeile['level'] - $input2;
    if ($new < 0) {
        echo "Leider besitzen sie zu wenig Bonuspunkte auf ihrem Konto, um bezahlen zu können!";
        echo '<br><a href="index.php">Zurück</a>';
        exit;
    } else {
        $sqlextra2 = "UPDATE `users` SET `level`=\"$new\" WHERE `username` = \"$input3\"";
        $db_ergextra2 = mysqli_query( $link, $sqlextra2 );
    }
}

$query = "DELETE FROM `checkout` WHERE `name` = \"$input1\""; 
$result = mysqli_query($link, $query); 
if( ! $result )
 {
 	echo 'Fehler beim bearbeiten!';
 }

header('location: index.php');
?>