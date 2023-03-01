<?php
$dateiname = fopen("config.php","w");
$daten = '<?php
$DB_HOST = "'. $_POST['input1'] .'";
$DB_USER = "'. $_POST['input2'] .'";
$DB_PASSWORD = "'. $_POST['input3'] .'";
$DB_NAME = "'. $_POST['input4'] .'";
$RESTAURANT_NAME = "'. $_POST['input5'] .'";
$MAIL_NEWS = "'. $_POST['input6'] .'";
$MAIL_NEWS_LINK = "'. $_POST['input7'] .'";
$MAIL_RECHNUNG = "'. $_POST['input8'] .'";
$LINK_TRACKEN = "'. $_POST['input9'] .'";
$LINK_BEWERTEN = "'. $_POST['input10'] .'";
$PASSWORT_ADMIN = "'. $_POST['input11'] .'";
$SHOW_lightgreen = "'. $_POST['input12'] .'";
$SHOW_darkgreen = "'. $_POST['input13'] .'";
$SHOW_orange = "'. $_POST['input14'] .'";
$SHOW_darkorange = "'. $_POST['input15'] .'";
$SHOW_red = "'. $_POST['input16'] .'";

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die("Unable to Connect to ". $DB_HOST. "");
mysqli_select_db($link, $DB_NAME) or die("Could not open the db ". $DB_NAME ."");
?>';

fwrite($dateiname, $daten);

echo '<p style="color: green;">Step 1: Erfolgreich!</p>';

$DB_HOST = $_POST['input1'];
$DB_USER = $_POST['input2'];
$DB_PASSWORD = $_POST['input3'];
$DB_NAME = $_POST['input4'];

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die('<p style="color: red;">Step 2: Error: Unable to Connect to db Host</p>');
mysqli_select_db($link, $DB_NAME) or die('<p style="color: red;">Step 2: Error: Could not open the db</p>');

echo '<p style="color: green;">Step 2: Erfolgreich!</p>';

echo '<p style="color: orange;">Step 3: Importieren sie <a href="/bestellen/setup.sql" download="setup.sql">diese File</a> in ihr Datenbank! Dannach haben sie das Setup fast abgeschlossen!</p>';

echo '<p style="color: orange;">Step 4: Erstellen sie <a href="aufgabe-add.php">hier</a> 11 Aufgaben für ihre Kunden!</p>';
?>