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
  <legend>Bonus Level</legend><br><br>
  <h3>Dein Level: <?php
  $sec = $_SESSION['id'];
  $sql1 = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
  $db_erg1 = mysqli_query( $link, $sql1 );
  while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC)) {
    echo '<strong>'.$zeile['level'].'</strong></h3>';
  }
  ?></h3>
  <h3>Level Up: <?php
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
echo "<tr>";
echo "<td> <h3>Bestellzeit</h3> </td>";
echo "<td> <h3>Bestellung</h3> </td>";
echo "<td> <h3>Zusatz</h3> </td>";
echo "<td> <h3>Tassengröße</h3> </td>";
echo '<td></td>';
echo '<td></td>';
echo "</tr>";
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  echo "<tr>";
  echo "<td> ". $zeile['Bestellzeit'] . " </td>";
  echo "<td> ". $zeile['Bestellung'] . " </td>";
  echo "<td> ". $zeile['Zusatz'] . " </td>";
  echo "<td> ". $zeile['TG'] . " </td>";
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