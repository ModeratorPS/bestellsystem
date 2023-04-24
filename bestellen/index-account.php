<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
 <!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Startseite Account</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Startseite.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Startseite</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Bestellen.php" style="padding: 10px 20px;">Bestellen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="/index.php" style="padding: 10px 20px;">Home</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Startseite</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Bestellen.php">Bestellen</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/index.php">Home</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <p class="u-text u-text-default u-text-1"><?php require_once "config.php"; echo $RESTAURANT_NAME; ?></p><?php
echo '<a href="logout.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Logout</a>';
echo '<a href="reset-password.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Passwort ändern</a>';
?>
      </div></header>
<?php
require_once "config.php";

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
<fieldset>
  <legend>Bonuspunkte</legend><br><br>
  <h3>Deine Bonuspunkte: <?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    echo '<strong>'.$zeile['level'].'</strong></h3>';
  }
  ?></h3>
  <h3>Fortschritt zum nächsten Bonuspunkt: <?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    echo '<strong>'.$zeile['proc'].' %</strong></h3>';
  }
  ?></h3>
    <div class="w3-light-grey">
<div id="myBar" class="w3-container" style="width:<?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    echo $zeile['proc'];
  }
  ?>%; background-color: <?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    if ($zeile['proc'] <= 25) {
      echo "#FF3D3D";
    } else if ($zeile['proc'] <= 50) {
      echo "#FFBB3D";
    } else if ($zeile['proc'] <= 75) {
      echo "#ADFF3D";
    } else {
      echo "#4CFF3D";
    }
  }
  ?>;"><?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    echo '<strong>'.$zeile['proc'].' %</strong>';
  }
  ?></div></div><br><br>
  </fieldset><br>
<fieldset>
  <legend>Dein Rang</legend>
  <?php
require_once "config.php";

$usern = $_SESSION['username'];
$sql_rang = "SELECT * FROM `users` WHERE `username` = \"$usern\"";
$result = mysqli_query($link, $sql_rang);
while($zeile2 = mysqli_fetch_array( $result, MYSQLI_ASSOC)) {
  $team = False;
  if ($zeile2['bewerten_rang'] == 'Admin') {
    $rang_icon = '<img src="role_icons/Admin.png" height="25" width="25">';
    $color = '#d83f3f';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == 'Chef') {
    $rang_icon = '<img src="role_icons/Chef2.png" height="25" width="25">';
    $color = '#ff2e4c';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == 'Developer') {
    $rang_icon = '<img src="role_icons/Developer2.png" height="25" width="25">';
    $color = '#1facbd';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == 'Manager') {
    $rang_icon = '<img src="role_icons/Manager.png" height="25" width="25">';
    $color = '#115bec';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == 'Moderator') {
    $rang_icon = '<img src="role_icons/Moderator.png" height="25" width="25">';
    $color = '#4b96dc';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == 'Supporter') {
    $rang_icon = '<img src="role_icons/Supporter.png" height="25" width="25">';
    $color = '#4b96dc';
    $team = True;
  } else if ($zeile2['bewerten_rang'] == '') {
    $rang_icon = '<img src="role_icons/0.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 1) {
    $rang_icon = '<img src="role_icons/0.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 3) {
    $rang_icon = '<img src="role_icons/2.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 5) {
    $rang_icon = '<img src="role_icons/4.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 7) {
    $rang_icon = '<img src="role_icons/6.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 9) {
    $rang_icon = '<img src="role_icons/8.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 11) {
    $rang_icon = '<img src="role_icons/10.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 13) {
    $rang_icon = '<img src="role_icons/12.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 15) {
    $rang_icon = '<img src="role_icons/14.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 17) {
    $rang_icon = '<img src="role_icons/16.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 19) {
    $rang_icon = '<img src="role_icons/18.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] <= 21) {
    $rang_icon = '<img src="role_icons/20.png" height="25" width="25">';
    $color = 'black';
  } else if ($zeile2['bewerten_rang'] >= 22) {
    $rang_icon = '<img src="role_icons/22+.png" height="25" width="25">';
    $color = 'black';
  }
  $rang = $zeile2['bewerten_rang'];
  if ($rang == '') {
    $rang = 0;
  }
}
if ($team == True) {
  echo '<h3 style="color: '.$color.';">'.$rang_icon.' <strong>'.$rang.'</strong></h3>';
} else {
  echo '<h3 style="color: '.$color.';">'.$rang_icon.' <strong>Level '.$rang.'</strong></h3>';
}
$rang_icon = '';
$color = '';
$rang = ''; 
?>
<a href="<?php require_once "config.php"; echo $LINK_BEWERTEN; ?>" class="u-btn u-button-style">Bewerten</a>
</fieldset><br>
<fieldset>
  <legend>Aufgaben</legend>
    <h4>Für jede Aufgabe steigt dein Rang um 2 Level!</h4>
    <?php
    require_once "config.php";
    $user = $_SESSION["username"];
    $sql1 = "SELECT * FROM `aufgaben`";
    $db_erg1 = mysqli_query( $link, $sql1 );
    while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
      $nr = $zeile['nr'] - 1;
      $res1 = 'aufgabe_'.$nr;
      if ($zeile['nr'] == 1) {
        $blured = 'Nein';
      } else {
        $blured_sql = "SELECT * FROM `users` WHERE `username` = \"$user\" AND `$res1` = 'True'";
        $blured_result = mysqli_query( $link, $blured_sql );
        $Blured_rows = mysqli_num_rows($blured_result);
        if ($Blured_rows == 0) {
          $blured = 'Ja';
        } else {
          $blured = 'Nein';
        }
      }
      if ($blured == 'Ja') {
        echo '<fieldset style="filter: blur(5px);">';
      } else {
        echo '<fieldset>';
      }
      echo '<legend>Aufgabe '.$zeile['nr'].'</legend>';
      if ($zeile['aufgabe'] == 'Bewertungen') {
        echo '<h3>Schreibe '.$zeile['count'].' Bewertungen!</h3>';
        $user = $_SESSION["username"];
        $aufgabe_sql = "SELECT * FROM `bewertungen` WHERE `username` = \"$user\"";
        $aufgabe_result = mysqli_query( $link, $aufgabe_sql );
        $num_rows = mysqli_num_rows($aufgabe_result);
        echo '<h4 style="color: gray;">'.$num_rows.' / '.$zeile['count'].'</h4>';
        if ($num_rows >= $zeile['count']) {
          $act = 'aufgabe_'.$zeile['nr'];
          $aufgabe_check_sql = "SELECT * FROM `users` WHERE `username` = \"$user\" AND `$act` = 'True'";
          $aufgabe_check_result = mysqli_query( $link, $aufgabe_check_sql );
          $num_rows_check = mysqli_num_rows($aufgabe_check_result);
          if ($num_rows_check == 1) {
            echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Abgeholt</a>';
          } else {
            if ($blured == 'Nein') {
              echo '<a href="aufgabe-erledigt.php?nr='.$zeile['nr'].'" class="u-btn u-button-style">Abholen</a>';
            } else {
              echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
            }
          }
        } else {
          echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
        }
      } else if ($zeile['aufgabe'] == 'Bestellungen') {
        echo '<h3>Bestelle '.$zeile['count'].' mal!</h3>';
        $user = $_SESSION["username"];
        $aufgabe_sql = "SELECT * FROM `bestellungen` WHERE `Name` = \"$user\"";
        $aufgabe_result = mysqli_query( $link, $aufgabe_sql );
        $num_rows = mysqli_num_rows($aufgabe_result);
        echo '<h4 style="color: gray;">'.$num_rows.' / '.$zeile['count'].'</h4>';
        if ($num_rows >= $zeile['count']) {
          $act = 'aufgabe_'.$zeile['nr'];
          $aufgabe_check_sql = "SELECT * FROM `users` WHERE `username` = \"$user\" AND `$act` = 'True'";
          $aufgabe_check_result = mysqli_query( $link, $aufgabe_check_sql );
          $num_rows_check = mysqli_num_rows($aufgabe_check_result);
          if ($num_rows_check == 1) {
            echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Abgeholt</a>';
          } else {
            if ($blured == 'Nein') {
              echo '<a href="aufgabe-erledigt.php?nr='.$zeile['nr'].'" class="u-btn u-button-style">Abholen</a>';
            } else {
              echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
            }
          }
        } else {
          echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
        }
      } else if ($zeile['aufgabe'] == 'Bonuspunkte') {
        echo '<h3>Besitze '.$zeile['count'].' Bonuspunkte!</h3>';
        $user = $_SESSION["username"];
        $aufgabe_sql = "SELECT * FROM `users` WHERE `username` = \"$user\"";
        $aufgabe_result = mysqli_query( $link, $aufgabe_sql );
        while ($zeile2 = mysqli_fetch_array( $aufgabe_result, MYSQLI_ASSOC)) {
          $level = $zeile2['level'];
        }
        echo '<h4 style="color: gray;">'.$level.' / '.$zeile['count'].'</h4>';
        if ($level >= $zeile['count']) {
          $act = 'aufgabe_'.$zeile['nr'];
          $aufgabe_check_sql = "SELECT * FROM `users` WHERE `username` = \"$user\" AND `$act` = 'True'";
          $aufgabe_check_result = mysqli_query( $link, $aufgabe_check_sql );
          $num_rows_check = mysqli_num_rows($aufgabe_check_result);
          if ($num_rows_check == 1) {
            echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Abgeholt</a>';
          } else {
            if ($blured == 'Nein') {
              echo '<a href="aufgabe-erledigt.php?nr='.$zeile['nr'].'" class="u-btn u-button-style">Abholen</a>';
            } else {
              echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
            }
          }
        } else {
          echo '<a disabled style="background-color: gray" class="u-btn u-button-style">Aufgabe noch nicht erledigt</a>';
        }
      }
      echo '</fieldset>';
      $blured = '';
    }
    ?>
</fieldset><br>
<fieldset>
  <legend>Hey Siri - Erweiterung - Ab Level 8</legend>
    <?php
    require_once "config.php";
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
      echo '<h4>Klicke <a href="https://www.icloud.com/shortcuts/bbe14f1cd8664d4eb1d502937de944a9" style="color: lightblue;"><strong>hier</strong></a> um den Siri Kurzbefehl hinzufügen zu können.</h4>';
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
</fieldset><br>
<fieldset>
    <legend>Letzte Bestellungen</legend>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
<?php
require_once "config.php";

$user = $_SESSION["username"];

$sql1 = "SELECT * FROM `bestellungen` WHERE `Name` = \"$user\"";
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
  echo '<td> <a style="color: orange;" href="tracking-senden.php?id='.$zeile['ID'].'">Tracken</a> </td>';
  echo '<td> <a style="color: gray;" href="bestellen-tgsenden.php?name='. $zeile['Name'] .'&mail='. $zeile['E-Mail'] .'&bestellung='. $zeile['Bestellung'] .'&zusatz='. $zeile['Zusatz'] .'&id='. $zeile['ID'] .'&tg='. $zeile['TG'] .'">Erneut Bestellen</a> </td>';
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