<?php
// Initialize the session
session_start();

require_once "config/config.php";

$num_row = 1;
$getted1 = $_SESSION['username'];
$getted2 = $_GET['mail'];
$getted3 = $_GET['bestellung'];
$getted4 = $_GET['zusatz'];
$input1 = str_replace("%20", " ", $getted1);
$input2 = str_replace("%20", " ", $getted2);
$input3 = str_replace("%20", " ", $getted3);
$input4 = str_replace("%20", " ", $getted4);
$input6 = $_GET['tg'];

$check_sql = 'SELECT * FROM `bestellungen` WHERE `Status`=0';
$check_result = mysqli_query( $link, $check_sql );
$check_rows = mysqli_num_rows( $check_result );
if ($check_rows != 0) {
  echo 'Bestellung gesendet!';
  exit;
}

$sql1 = "SELECT * FROM `status_rst`";
$db_erg1 = mysqli_query( $link, $sql1 );
if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  if ($zeile['Status'] == "Geschlossen") {
	echo 'Error: Das Restaurant hat geschlossen!';
  }
  if ($zeile['Status'] == "Geöffnet") {
    $query3 = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$input3\"";
    $result3 = mysqli_query($link, $query3); 
    while($zeile = mysqli_fetch_array( $result3, MYSQLI_ASSOC)) {
      if ($zeile['lager'] == '0') {
        echo 'Error: Leider ist der Artikel ausverkauft!';
        exit;
      }
      $new = $zeile['lager'] - 1;
    }

    while ($num_row > 0) {
        $input5 = rand(1000, 9999);
        $sql_test = "SELECT * FROM `bestellungen` WHERE `ID` = \"$input5\"";
        $sql_result = mysqli_query( $link, $sql_test );
        $num_row = mysqli_num_rows($sql_result);
    }

    $query2 = "UPDATE `Artikelliste` SET `lager`=\"$new\" WHERE `artikel` = \"$input3\""; 
	  $result2 = mysqli_query($link, $query2); 

    $query = "INSERT INTO `bestellungen` (`Name`, `Bestellung`, `ID`, `Status`, `TG`) VALUES ('$input1', '$input3', '$input5', '0', '$input6');"; 
	  $result = mysqli_query($link, $query); 

    if ($input2 != "") {
      $betreff = 'Restaurant Rechnung #'. $input5 .'';
      $inhalt = '
        <fieldset>
          <legend>Deine Bestellung</legend>
          <strong style="color: gray;">ID:</strong> '. $input5 .'<br>
          <strong style="color: gray;">Name:</strong> '. $input1 .'<br>
          <strong style="color: gray;">Mail:</strong> '. $input2 .'<br>
          <strong style="color: gray;">Bestellung:</strong> '. $input3 .'<br>
          <strong style="color: gray;">Zusatz:</strong> '. $input4 .'<br><br>
        </fieldset>
        <fieldset>
          <legend>Verknüpfungen</legend>
          <a href="'. $LINK_TRACKEN. '">Deine Bestellung Tracken</a><br>
          <a href="'. $LINK_BEWERTEN .'">Deine Bestellung Bewerten</a>
        </fieldset>
      ';
      $header  = "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html; charset=utf-8\r\n";
      $header .= "From: $MAIL_RECHNUNG\r\n";
      $header .= "X-Mailer: PHP ". phpversion();
      $adresse = $input2;
      @mail($adresse,$betreff,$inhalt,$header);
    }
    echo 'Bestellung gesendet!';
  }
}
mysqli_free_result( $db_erg1 );
?>
      </div>
    </section>
</body></html>