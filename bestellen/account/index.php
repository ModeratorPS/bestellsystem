<?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  header('location: ../index.php');
}

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<style>
.apple_error{
  background: #f5f5f5;
  border: 2px solid #F3C336;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  box-shadow: 1px 2px 4px rgba(0,0,0,.4);
}
</style>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Startseite Account</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Startseite.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <?php
    $snowflakeModuleQuery = "SELECT * FROM `module` WHERE `name` = 'Schneeflocken' and `status` = 'on'";
    $snowflakeModuleResult = mysqli_query($link, $snowflakeModuleQuery);
    $snowflakeModuleRows = mysqli_num_rows($snowflakeModuleResult);
    if ($snowflakeModuleRows == 1) {
      require_once "../designs/snow.php";
    }
    ?>

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Restaurant"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Startseite">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-03fb"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-align-left u-menu u-menu-dropdown u-menu-hamburger u-offcanvas u-menu-1" data-responsive-from="XL">
          <div class="menu-collapse">
            <a class="u-button-style u-nav-link" href="#" style="padding: 4px 0px; font-size: calc(1em + 8px);">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5c50"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-5c50" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><?php
$lines = file('../config/menu_normal_1.txt');
foreach($lines as $line) {
  echo $line;
}
?></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><?php
$lines = file('../config/menu_normal_2.txt');
foreach($lines as $line) {
  echo $line;
}
?></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "../config/config.php"; echo $RESTAURANT_NAME; ?></p><?php
echo '<a href="logout.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Logout</a>';
echo '<a href="reset-password.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Passwort ändern</a>';
if ($_SESSION["loggedin_admin"] === true) {
  echo '<a href="../admin/index.php" style="background-color: #FF4343; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Admin Portal</a>';
}
?>
      </div></header>
<?php
require_once "../config/config.php";

$sql1 = "SELECT * FROM `status_rst`";
$db_erg1 = mysqli_query( $link, $sql1 );
if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  if ($zeile['Status'] == "Geschlossen") {
    echo '<section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">';
    echo '<fieldset>
    <legend>Restaurant Status</legend>';
    echo '<div class="u-clearfix u-sheet u-sheet-1"><span class="u-icon u-text-palette-2-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 52 52" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-636b"></use></svg><svg class="u-svg-content" viewBox="0 0 52 52" x="0px" y="0px" id="svg-636b" style="enable-background:new 0 0 52 52;"><g><path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M40.495,17.329l-16,18';
    echo 'C24.101,35.772,23.552,36,22.999,36c-0.439,0-0.88-0.144-1.249-0.438l-10-8c-0.862-0.689-1.002-1.948-0.312-2.811';
    echo 'c0.689-0.863,1.949-1.003,2.811-0.313l8.517,6.813l14.739-16.581c0.732-0.826,1.998-0.9,2.823-0.166';
    echo 'C41.154,15.239,41.229,16.503,40.495,17.329z"></path>';
    echo '</g></svg></span>';
    echo '<h3 class="u-text u-text-default u-text-palette-2-base u-text-1">Closed</h3>';
  }
  if ($zeile['Status'] == "Geöffnet") {
    echo '<section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">';
    echo '<fieldset>
    <legend>Restaurant Status</legend>';
    echo '<div class="u-clearfix u-sheet u-sheet-1"><span class="u-icon u-text-palette-4-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 52 52" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-636b"></use></svg><svg class="u-svg-content" viewBox="0 0 52 52" x="0px" y="0px" id="svg-636b" style="enable-background:new 0 0 52 52;"><g><path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M40.495,17.329l-16,18';
    echo 'C24.101,35.772,23.552,36,22.999,36c-0.439,0-0.88-0.144-1.249-0.438l-10-8c-0.862-0.689-1.002-1.948-0.312-2.811';
    echo 'c0.689-0.863,1.949-1.003,2.811-0.313l8.517,6.813l14.739-16.581c0.732-0.826,1.998-0.9,2.823-0.166';
    echo 'C41.154,15.239,41.229,16.503,40.495,17.329z"></path>';
    echo '</g></svg></span>';
    echo '<h3 class="u-text u-text-default u-text-palette-4-base u-text-1">Geöffnet</h3>';
  }
}
mysqli_free_result( $db_erg1 );
?>
</fieldset><br>
<?php
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
  $result = mysqli_query($link, $sql);
  while ($zeile = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
    $mail = $zeile['mail'];
  }
  $sql2 = "SELECT * FROM `mail_verify` WHERE `confirmed` = '0' AND `mail` = '$mail'";
  $result2 = mysqli_query($link, $sql2);
  $num = mysqli_num_rows($result2);
  if ($num == 1) {
    echo '<fieldset>
    <h3>Dieser Account ist noch nicht verifiziert</h3>
    <a href="verify-mail.php?mail='.$mail.'" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Jetzt verifizieren</a>
    <h4>Um weitere Funktionen freizuschalten, muss der Account verifiziert sein!</h4>
    </fieldset><br><br>';
    return;
  }
?>
<fieldset <?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 == 0) {
  echo "display: none; visibility: hidden";
}
?>>
  <legend>Bewerten</legend>
  <?php
require_once "../config/config.php";
$besonders == "False";
$usern = $_SESSION['username'];
$sql_rang = "SELECT * FROM `users` WHERE `username` = \"$usern\"";
$result = mysqli_query($link, $sql_rang);
while($zeile2 = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
  if ($zeile2['bewerten_rang'] == 'Admin') {
    $rang_icon = '<img src="../icons/admin.png" height="25" width="25">';
    $color = '#ff6c60';
    $rang = 'Admin';
  } else if ($zeile2['bewerten_rang'] == 'Team') {
    $rang_icon = '<img src="../icons/team.png" height="25" width="25">';
    $color = '#7daff5';
    $rang = 'Team';
  } else {
    $rang_icon = '<img src="../icons/user.png" height="25" width="25">';
    $color = 'black';
    $rang = 'Mitglied';
  }
}
echo '<h3 style="color: '.$color.';">'.$rang_icon.' <strong>'.$rang.'</strong></h3>';
$rang_icon = '';
$color = '';
$rang = ''; 
?>
<a href="<?php require_once "../config/config.php"; echo $LINK_BEWERTEN; ?>" class="u-btn u-button-style">Bewerten</a>
</fieldset><?php
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Bewerten' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 != 0) {
  echo "<br>";
}
?>
<fieldset <?php
require_once "../config/config.php";
$nr_2 = "SELECT * FROM `module` WHERE `name` = 'Achievements' and `status` = 'on'";
$nr_result2 = mysqli_query($link, $nr_2);
$nr2 = mysqli_num_rows($nr_result2);
if ($nr2 == 0) {
  echo "display: none; visibility: hidden";
}
?>>
  <legend>Achievements</legend>
    <?php
    require_once "../config/config.php";
    $user = $_SESSION["username"];
    $sql1 = "SELECT * FROM `achievement`";
    $db_erg1 = mysqli_query( $link, $sql1 );
    while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
      $color = "";
      $icon = "";
      $text = "";
      if ($zeile["type"] == "Bewerten") {
        $sql_check = "SELECT * FROM `bewertungen` WHERE `username` = \"$user\"";
        $sql_check_result = mysqli_query( $link, $sql_check );
        $sql_check_num_rows = mysqli_num_rows( $sql_check_result );
        if ( $sql_check_num_rows >= $zeile["count"]) {
          $color = "#67FF60";
          $icon = $zeile["icon_normal"];
          $text = "Schreibe ".strval($zeile["count"])." Bewertungen!<br> Du hast ".strval($zeile["count"])."/".strval($zeile["count"])." geschrieben!";
        } else {
          $color = "#FF6060";
          $icon = $zeile["icon_glitch"];
          $text = "Schreibe ".strval($zeile["count"])." Bewertungen!<br> Du hast ".$sql_check_num_rows."/".strval($zeile["count"])." geschrieben!";
        }
      }
      else if ($zeile["type"] == "Bestellen") {
        $sql_check = "SELECT * FROM `bestellungen` WHERE `Name` LIKE \"%$user%\"";
        $sql_check_result = mysqli_query( $link, $sql_check );
        $sql_check_num_rows = mysqli_num_rows( $sql_check_result );
        if ( $sql_check_num_rows >= $zeile["count"]) {
          $color = "#67FF60";
          $icon = $zeile["icon_normal"];
          $text = "Bestelle ".strval($zeile["count"])." mal!<br> Du hast ".strval($zeile["count"])."/".strval($zeile["count"])." mal bestellt!";
        } else {
          $color = "#FF6060";
          $icon = $zeile["icon_glitch"];
          $text = "Bestelle ".strval($zeile["count"])." mal!<br> Du hast ".$sql_check_num_rows."/".strval($zeile["count"])." mal bestellt!";
        }
      }
      echo '<fieldset style="display: inline-block; border-color: '.$color.'; border-style: solid;">';
      echo '<legend style="color: '.$color.'">'.$zeile['achievement'].'</legend>';
      echo '<img src="../icons/'.$icon.'" height="50" width="50"> '.$text;
      echo '</fieldset>';
      if ($zeile["br"]) {
        echo "<br>";
      }
    }
    ?>
</fieldset><?php
require_once "../config/config.php";
$nr_a = "SELECT * FROM `achievement`";
$nr_result = mysqli_query($link, $nr_a);
$nr = mysqli_num_rows($nr_result);
$nr = 0;
$already = False;
if ($nr != 0) {
  echo "<br>";
  $already = True;
}
$nr_2 = "SELECT * FROM `module` WHERE `name` = 'Achievements' and `status` = 'on'";
$nr_result2 = mysqli_query($link, $nr_2);
$nr2 = mysqli_num_rows($nr_result2);
if ($nr2 != 0) {
  if ($already != True) {
    echo "<br>";
  }
}
?>
<fieldset style="display: none; visibility: hidden" <?php
require_once "../config/config.php";
$nr_2 = "SELECT * FROM `module` WHERE `name` = 'Achievements' and `status` = 'on'";
$nr_result2 = mysqli_query($link, $nr_2);
$nr2 = mysqli_num_rows($nr_result2);
if ($nr2 == 0) {
  echo "display: none; visibility: hidden";
}
?>>
  <legend>Hey Siri - Erweiterung - Ab Level 8</legend>
    <?php
    require_once "../config/config.php";
    $user = $_SESSION["username"];
    $blured_sql = "SELECT * FROM `users` WHERE `username` = \"$user\" AND `bewerten_rang` > 7";
    $blured_result = mysqli_query( $link, $blured_sql );
    $Blured_rows = mysqli_num_rows($blured_result);
    if ($Blured_rows == 0) {
      $blured = 'Ja';
    } else {
      $blured = 'Nein';
    }
    if ($blured == 'Ja') {
      echo '<div style="filter: blur(5px);">';
      echo '<h4>Klicke <a href="" disabled style="color: lightblue;"><strong>hier</strong></a> um den Siri Kurzbefehl hinzufügen zu können.</h4>';
    } else {
      echo '<div>';
      echo '<h4>Klicke <a href="https://www.icloud.com/shortcuts/9c25182efc584193a485ebdbca8a57c2" style="color: lightblue;"><strong>hier</strong></a> um den Siri Kurzbefehl hinzufügen zu können.</h4>';
    }
    echo '<p><strong>Tutorial:</strong><br>
    <strong>Step 1: </strong>Klicke auf den Link und füge den Kurzbefehl hinzu.<br>
    <strong>Step 2: </strong>Drücke in der App Kurzbefehle (beim Kurzbefehl bestellen) auf den Button mit den drei Punkten.<br>
    <strong>Step 3: </strong>Ersetze den Text Username mit deinem Usernamen. (Beachte: Nach dem Username kein Leerzeichen oder Enter)<br>
    <strong>Step 4: </strong>Ersetze den Text Passwort mit deinem Passwort. (Beachte: Nach dem Username kein Leerzeichen oder Enter. Wichtig: Dein Passwort darf bestimmte Sonderzeichen nicht enthalten.)<br>
    <strong>Step 5: </strong>Ersetze den Text Website (...) mit <strong>'.$MAIL_NEWS_LINK.'</strong>. (Beachte: Nach der Adresse kein Leerzeichen oder Enter)<br>
    ... Jetzt bist du Fertig! Sage Hey Siri, bestellen</p>';
    echo '</div>';
    ?>
</fieldset><?php
require_once "../config/config.php";
$nr_a = "SELECT * FROM `achievement`";
$nr_result = mysqli_query($link, $nr_a);
$nr = mysqli_num_rows($nr_result);
$nr = 0;
$already = False;
if ($nr != 0) {
  echo "<br>";
  $already = True;
}
$nr_2 = "SELECT * FROM `module` WHERE `name` = 'Achievements' and `status` = 'on'";
$nr_result2 = mysqli_query($link, $nr_2);
$nr2 = mysqli_num_rows($nr_result2);
if ($nr2 != 0) {
  if ($already != True) {
    echo "<br>";
  }
}
?>
<fieldset>
    <legend>Letzte Bestellungen</legend>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
<?php
require_once "../config/config.php";

$user = $_SESSION["username"];

$sql1 = "SELECT * FROM `bestellungen` WHERE `Name` LIKE \"%$user%\"";
$db_erg1 = mysqli_query( $link, $sql1 );

$num_rows = mysqli_num_rows($db_erg1);

if ($num_rows == 0) {
  echo '<h3 align="center" class="u-text-palette-2-base"><strong>Es wurden keine Bestellungen gefunden!</strong></h3>';
  exit;
}

if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
echo '<table border="1">';
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  echo "<tr>";
  echo "<td> ". $zeile['Bestellung'] . " </td>";
  echo '<td> <a style="color: orange;" href="../tracking/tracking-senden.php?id='.$zeile['ID'].'">Tracken</a> </td>';
  echo "</tr>";
}
echo "</table>";
mysqli_free_result( $db_erg1 );
?>
            </div>
          </div>
        </div>
      </div>
  </fieldset>
<br>
</div>
      </div>
    </section>
</body></html>