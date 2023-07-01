<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="de"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Author&amp;apos;s cake and desserts for your holiday, ​Few words about myself, ​Catalog, How We Work, Facts &amp;amp; Questions, ​​Best Choice, ​Make an order">
    <meta name="description" content="">
    <title>Bestellung senden</title>
    <link rel="stylesheet" href="../nicepage.css" media="screen">
<link rel="stylesheet" href="../Startseite.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
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
require_once "../config/config.php";
$nr_3 = "SELECT * FROM `module` WHERE `name` = 'Account' and `status` = 'on'";
$nr_result3 = mysqli_query($link, $nr_3);
$nr3 = mysqli_num_rows($nr_result3);
if ($nr3 != 0) {
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    echo '<a href="../account/login.php" style="background-color: #FF613D; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account Login</a>';
  } else {
    echo '<a href="../account/index.php" style="background-color: #5B67FF; font-size: 20px" class="u-btn u-button-style u-text u-text-default u-text u-text-default u-text-1">Account</a>';
  }
}
?>
      </div></header>
      <section class="u-clearfix u-palette-3-light-3 u-section-1" id="sec-8f5b">
<style>
.menu_button {
    color: orange;
    background-color: white;
    padding: 8px 16px;
    font-size: 16px;
    display: flex;
    font-weight: 600;
    border-radius: 2px;
    cursor: pointer;
    box-shadow: 2px 0px 8px rgb(0 0 0 / 20%);
    border: unset;
}

.menu_button:hover {
    background-color: rgb(155, 153, 153);
    color: white;
}
</style>
<?php
require_once "../config/config.php";

$getted1 = $_GET['name'];
$getted2 = $_GET['mail'];
$getted3 = $_GET['bestellung'];
$getted4 = $_GET['zusatz'];
$getted5 = $_GET['id'];
$input1 = str_replace("%20", " ", $getted1);
$input2 = str_replace("%20", " ", $getted2);
$input3 = str_replace("%20", " ", $getted3);
$input4 = str_replace("%20", " ", $getted4);
$input5 = str_replace("%20", " ", $getted5);
$input6 = $_POST['input1'];

$getted8 = $_GET['code'];
$input8 = str_replace("%20", " ", $getted8);

if (!$input6) {
  $input6 = $_GET['tg'];
}

$input7 = $_POST['input2'];

$date1=date("Y");
$date2=$input7;
$diff = $date1 - $date2;

$sql1 = "SELECT * FROM `status_rst`";
$db_erg1 = mysqli_query( $link, $sql1 );
if ( ! $db_erg1 )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erg1, MYSQLI_ASSOC))
{
  if ($zeile['Status'] == "Geschlossen") {
	  echo '<h4 align="center" class="u-text-palette-3-base"><strong>Bestellung senden . . .</strong></h4>';
    $trk2 = str_replace("/tracking/index.php", "/bestellen/bestellt-error.php?code=474", $LINK_TRACKEN);
    echo '<meta http-equiv="refresh" content = "1;url='.$trk2.'">';
  }
  if ($zeile['Status'] == "Geöffnet") {
    echo '<h4 align="center" class="u-text-palette-3-base"><strong>Bestellung senden . . .</strong></h4>';

    $query4 = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$input3\"";
    $result4 = mysqli_query($link, $query4); 
    while($zeile = mysqli_fetch_array( $result4, MYSQLI_ASSOC)) {
      if ($zeile['extra_info_bedingung'] > $diff) {
        $trk2 = str_replace("/tracking/index.php", "/bestellen/bestellt-error.php?code=939", $LINK_TRACKEN);
        echo '<meta http-equiv="refresh" content = "1;url='.$trk2.'">';
        exit;
      }
    }

    $query3 = "SELECT * FROM `Artikelliste` WHERE `artikel` = \"$input3\"";
    $result3 = mysqli_query($link, $query3); 
    while($zeile = mysqli_fetch_array( $result3, MYSQLI_ASSOC)) {
      if ($zeile['lager'] == '0') {
        $trk2 = str_replace("/tracking/index.php", "/bestellen/bestellt-error.php?code=404", $LINK_TRACKEN);
        echo '<meta http-equiv="refresh" content = "1;url='.$trk2.'">';
        exit;
      }
      $new = $zeile['lager'] - 1;
    }

    $query2 = "UPDATE `Artikelliste` SET `lager`=\"$new\" WHERE `artikel` = \"$input3\""; 
	  $result2 = mysqli_query($link, $query2); 

    $query = "INSERT INTO `bestellungen` (`Name`, `E-Mail`, `Bestellung`, `Zusatz`, `ID`, `Status`, `TG`, `code`) VALUES ('$input1', '$input2', '$input3', '$input4', '$input5', '0', '$input6', '$input8');"; 
	  $result = mysqli_query($link, $query); 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      $sec = $_SESSION['id'];
      $sqlextra = "SELECT * FROM `users` WHERE `id` = \"$sec\"";
      $db_ergextra = mysqli_query( $link, $sqlextra );
      while ($zeile = mysqli_fetch_array( $db_ergextra, MYSQLI_ASSOC)) {
        $new_1 = $zeile['proc'] + 20;
        $new_2 = $zeile['level'] + 1;
        if ($new_1 >= 100) {
          $sqlextra2 = "UPDATE `users` SET `level`=\"$new_2\", `proc`='0' WHERE `id` = \"$sec\"";
          $db_ergextra2 = mysqli_query( $link, $sqlextra2 );
        } else {
          $sqlextra2 = "UPDATE `users` SET `proc`=\"$new_1\" WHERE `id` = \"$sec\"";
          $db_ergextra2 = mysqli_query( $link, $sqlextra2 );
        }
      }
    }

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
    $trk = str_replace("/tracking/index.php", "/bestellen/bestellt-abgeschlossenn.php?id=".$input5, $LINK_TRACKEN);
    echo '<meta http-equiv="refresh" content = "1;url='.$trk.'">';
  }
}
mysqli_free_result( $db_erg1 );
?>
      </div>
    </section>
</body></html>